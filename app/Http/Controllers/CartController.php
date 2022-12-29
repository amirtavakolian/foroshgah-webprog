<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Product;
use App\Models\Panel\Category;
use App\Models\Panel\ProductVariation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('cart.cart-index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "product_id" => "required|exists:products,id",
            "qtybutton" => "required|integer",
            "variationID" => "required|exists:product_variations,id"
        ]);

        if ($validator->fails()) {
            alert()->alert('', 'خطا در انتخاب محصول لطفا دوباره تلاش کنید');
            return redirect()->back();
        }

        $product = Product::findOrFail($request->product_id);
        // $variations = $product->variations->where('id', $request->variationID)->first();
        $variation = ProductVariation::findOrFail($request->variationID);

        if ($variation->quantity < $request->qtybutton) {
            alert()->alert('عدم موجودی', "موجودی محصول انتخابی فقط $variation->quantity عدد میباشد");
            return redirect()->back();
        }

        $rowID = $product->id . '-' . $variation->id;

        if (\Cart::get($rowID) == null) {
            \Cart::add([
                "id" => $rowID,
                'name' => $product->name,
                'price' => $variation->saleCheck ? $variation->saleCheck->sale_price : $variation->price,
                'quantity' => $request->qtybutton,
                'conditions' => $variation->saleCheck ?? false,
                'attributes' => $variation,  // to doc E package gofte array bede :D
                'associatedModel' => $product
            ]);
            alert()->success('محصول با موفقیت اضافه شد');
            return redirect()->back();
        }

        alert()->error('این محصول قبلا به سبد خرید اضافه شده');
        return redirect()->back();

        /*
        variationID
        qtybutton
        product_id
        */
    }
}
