<?php

use App\Models\Panel\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategory;
use App\Http\Controllers\Panel\BrandController;
use App\Http\Controllers\Panel\BannerController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\AttributeController;
use App\Models\Panel\Product;
use App\Models\Panel\ProductVariation;

Route::get("/panel", function () {
    return view('panel.index');
});

Route::get("/amir", function(){


    /* $a = Product::all();
    foreach($a as $b){
        dump($b->variationsOrderByAsc);
    } */
});

Route::get("/", [HomeController::class, 'index']);

Route::group(['prefix' => 'panel'], function () {

    Route::resource('brand', BrandController::class);

    Route::resource('attribute', AttributeController::class);

    // Get all attributes for ajax request:
    Route::post('attribute/all', [AttributeController::class, 'all'])->name('attribute.all');

    Route::resource('category', CategoryController::class);

    Route::resource('product', ProductController::class);

    Route::post('product/categoryAttributes/{category}', [ProductController::class, 'categoryAttributes'])->name('product.attributes');
    Route::post("product/{product}/getProduct", [ProductController::class, 'getProduct'])->name('product.getProduct');
    Route::post("product/{productvariation}/getProductVariations", [ProductController::class, 'getProductVariations'])->name('product.getProductVariations');

    Route::resource('banner', BannerController::class);
});

Route::get("/products/category/{category:slug}", [ProductCategory::class, 'show'])->name('productsCategory.attributes');
// Route::get("/products/category/variations/{category:slug}", [ProductCategory::class, 'variations'])->name('productsCategory.variations');
