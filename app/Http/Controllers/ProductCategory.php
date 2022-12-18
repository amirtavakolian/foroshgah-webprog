<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\Panel\Category;
use App\Models\Panel\Product;
use App\Models\Panel\ProductVariation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Controller
{
    public function show(Category $category, Request $request)
    {
        $atter = "";
        $variations = "";
        $categories = Category::all();
        $attributes = new Collection();
        $variations = new Collection();

 /*        if(!empty($request->get('orderBy'))){
            if(in_array($request->get('orderBy'), ['max','min','new','old'])){
                $order = Product::with('variations')
                ->join('product_variations', 'product_variations.product_id', '=', 'products.id')
                ->select('products.*') // Avoid selecting everything from the stocks table
                ->orderBy('product_variations.price', 'asc')
                ->get();
            }
        } */



        /*
        dump($category->products()->where('category_id', $category->id)->get());
        */

        if ($request->get('attributes') != null) {

            $products = Product::where('category_id', $category->id);
            $attributes = $products->whereHas('attributes', (function($query) use($request){
                foreach($request->get('attributes') as $index=>$param){
                    if($index == 0){
                        $query->where('value', $param);
                    }else{
                        $query->orWhere('value', $param);
                    }
                }
            }))->get();


      /*       foreach ($products as $product) {
                foreach ($product->attributes as $attr) {
                    if (in_array($attr->pivot->value, $request->get('attributes'))) {
                        array_push($attributes, $product);
                    }
                }
            } */
        }

        if ($request->get('variations') != null) {
            $products = Product::where('category_id', $category->id);

            // u can put all these codes in scope :D   P F scopeActive($query){}
            $variations = $products->whereHas('variations', (function($query) use($request){
                foreach($request->get('variations') as $index=>$param){
                    if($index == 0){
                        $query->where('value', $param);
                    }else{
                        $query->orWhere('value', $param);
                    }
                }
            }))->get();


          /*
            foreach ($products as $product) {
                foreach ($product->variations as $variation) {
                    if (in_array($variation->value, $request->get('variations'))) {
                        array_push($variations, $product);
                    }
                }
            }
        */
        }

        // attributes & variations concated togather
        $attributes = $attributes->merge($variations);

        return view('shop.shop', compact('category', 'categories', 'attributes'));

        /*         if ($request->get('variations') != null) {
        }
        if(!empty($atter) || !empty($variations)){
            return view('shop.shop1', compact('category', 'attributes', 'variations'));
        }
         */
    }
}
