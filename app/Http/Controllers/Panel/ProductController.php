<?php

namespace App\Http\Controllers\Panel;

use Exception;
use Carbon\Carbon;
use App\Models\Panel\Tag;
use App\Models\Panel\Brand;
use Illuminate\Http\Request;
use App\Models\Panel\Product;
use App\Models\Panel\Category;
use App\Models\Panel\Attribute;
use Services\Uploader\Uploader;
use App\Models\Panel\ProductImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Panel\ProductVariation;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('panel.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all()->where('parent_id', '!=', null);
        $attributes = Attribute::all();
        $tags = Tag::all();
        $brands = Brand::all();
        return view('panel.products.create', compact('categories', 'attributes', 'tags', 'brands'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $tags = Tag::all();
        return view('panel.products.edit', compact('product', 'brands', 'tags'));
    }

    public function update(Product $product, Request $request)
    {
        dd($request->all());
        $data = [
            "name" => $request->name,
            "brand_id" => $request->brand_id,
            "category_id" => $request->category_id,
            "is_active" => $request->is_active,
            "description" => $request->description,
            "delivery_amount" => $request->delivery_amount,
            "delivery_amount_per_product" => $request->delivery_amount_per_product
        ];

        if (isset($request->primary_image)) {
            $primaryImage = Uploader::upload($request->primary_image, '/images/product');
            $data['primary_image'] = $primaryImage;
        }

        $updatedProduct = $product->query()->updateOrCreate(['id' => $product->id], $data);

        $updatedProduct->tags()->detach();

        foreach ($request->tag_ids as $tagID) {
            $updatedProduct->tags()->attach($updatedProduct->id, [
                'tag_id' => $tagID
            ]);
        }

        $updatedProduct->attributes()->detach();

        foreach ($request->filter as $key => $value) {
            $updatedProduct->attributes()->attach($updatedProduct, [
                "attribute_id" => $key,
                "value" => $value,
                "is_active" => $request->is_active
            ]);
        }

        ProductVariation::where('product_id', $product->id)->delete();

        foreach ($request->variation as $variable) {
            $insertData = [
                "attribute_id" => $request->variationid,
                "product_id" => $updatedProduct->id,
                "value" => $variable[0],
                "price" => $variable[1],
                "quantity" => $variable[2],
                "sku" => $variable[3]
            ];
            ProductVariation::create($insertData);
        }

        if ($request->images != null) {
            ProductImage::where('product_id', $product->id)->delete();

            foreach ($request->images as $image) {
                $fileName = Uploader::upload($image, '/images/product');
                ProductImage::create([
                    "product_id" => $updatedProduct->id,
                    "image" => $fileName
                ]);
            }
        }

        alert()->success('محصول با موفقیت بروز رسانی شد');
        return redirect()->back();
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $primaryImage = Uploader::upload($request->primary_image, '/images/product');

            $productID = Product::create([
                "name" => $request->name,
                "brand_id" => $request->brand_id,
                "category_id" => $request->category_id,
                "is_active" => $request->is_active,
                "description" => $request->description,
                "primary_image" => $primaryImage,
                "delivery_amount" => $request->delivery_amount,
                "delivery_amount_per_product" => $request->delivery_amount_per_product
            ]);

            foreach ($request->tag_ids as $tagID) {
                $productID->tags()->attach($productID->id, [
                    'tag_id' => $tagID
                ]);
            }

            foreach ($request->filter as $key => $value) {
                $productID->attributes()->attach($productID, [
                    "attribute_id" => $key,
                    "value" => $value,
                    "is_active" => $request->is_active
                ]);
            }

            foreach ($request->variation as $variable) {
                $insertData = [
                    "attribute_id" => $request->variationid,
                    "product_id" => $productID->id,
                    "value" => $variable[0],
                    "price" => $variable[1],
                    "quantity" => $variable[2],
                    "sku" => $variable[3]
                ];
                ProductVariation::create($insertData);
            }

            if ($request->images != null) {
                foreach ($request->images as $image) {
                    $fileName = Uploader::upload($image, '/images/product');
                    ProductImage::create([
                        "product_id" => $productID->id,
                        "image" => $fileName
                    ]);
                }
            }
            DB::commit();
            alert()->success('ایجاد محصول با موفقیت انجام شد');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            alert()->error('خطا در ایجاد محصول', $e->getMessage());
            return redirect()->back();
        }
    }

    public function categoryAttributes(Category $category)
    {
        return $category;
    }

    public function getProduct(Product $product)
    {
        return $product;
    }

    public function getProductVariations($id)
    {
        $variation = ProductVariation::where('id', $id)->first();
        if ($variation->date_on_sale_from < Carbon::now() && $variation->date_on_sale_to >= Carbon::now()) {
            return [
                "price" => $variation->price,
                "sale_price" => $variation->sale_price
            ];
        }
        return [
            "price" => $variation->price
        ];
    }
}
