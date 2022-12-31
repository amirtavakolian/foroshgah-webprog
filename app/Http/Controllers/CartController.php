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
        $variation = ProductVariation::findOrFail($request->variationID);
        // $variations = $product->variations->where('id', $request->variationID)->first();

        if (checkQuantity($variation->quantity, $request->qtybutton)){
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
    }

    public function update($cart, Request $request)
    {
        foreach($request->qtybutton as $key=>$value){
            if(checkQuantity((\Cart::getContent()[$key])->attributes->quantity, $value)){
                alert()->alert('عدم موجودی', "موجودی محصول انتخابی فقط".(\Cart::getContent()[$key])->attributes->quantity . " عدد میباشد");
                return redirect()->back();
            }
        }

        foreach($request->qtybutton as $key=>$value){
            \Cart::update($key, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $value
                ),
              ));
        }
        alert()->success('محصول با موفقیت بروز رسانی شد.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Cart::remove($id);
        alert()->success('', "محصول مورد نظر با موفقیت حذف شذ");
        return redirect()->back();
    }
}

