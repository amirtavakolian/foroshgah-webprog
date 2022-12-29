<?php

use App\Models\Comment;
use Ghasedak\Laravel\GhasedakFacade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategory;
use App\Http\Controllers\OTP\OTPController;
use App\Http\Controllers\Panel\BrandController;
use App\Http\Controllers\Panel\BannerController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\AttributeController;

use function PHPUnit\Framework\isEmpty;

Route::get("/panel", function () {
    return view('panel.index');
});

Route::get("/test", function () {
    foreach(\Cart::getContent() as $product){
        dump($product->attributes->date_on_sale_from);
    }
});


Route::get("/", [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'panel'], function () {

    Route::resource('brand', BrandController::class);

    Route::resource('attribute', AttributeController::class);

    // Get all attributes for ajax request:
    Route::post('attribute/all', [AttributeController::class, 'all'])->name('attribute.all');

    Route::resource('category', CategoryController::class);

    Route::resource('banner', BannerController::class);

    Route::resource('comment', CommentController::class)->except(['store', 'show']);
    Route::post('/comment/{comment}/approve', [CommentController::class, 'approveComment'])->name('comment.approve');
    Route::post('/comment/{comment}/cancel', [CommentController::class, 'cancelComment'])->name('comment.cancel');
    Route::post('/comment/{comment}/fullcomment', [CommentController::class, 'fullcomment'])->name('comment.fullcomment');

    Route::resource('product', ProductController::class);
    Route::post('product/categoryAttributes/{category}', [ProductController::class, 'categoryAttributes'])->name('product.attributes');
    Route::post("product/{product}/getProduct", [ProductController::class, 'getProduct'])->name('product.getProduct');
    Route::post("product/{productvariation}/getProductVariations", [ProductController::class, 'getProductVariations'])->name('product.getProductVariations');

});

Route::get("/products/category/{category:slug}", [ProductCategory::class, 'show'])->name('productsCategory.attributes');
// Route::get("/products/category/variations/{category:slug}", [ProductCategory::class, 'variations'])->name('productsCategory.variations');

// OTP Authentication:
Route::get("/otp/login", [OTPController::class, 'index']);
Route::post("/otp/code", [OTPController::class, 'generateCode'])->name('otp.generate');
Route::get("/otp/login/{token}", [OTPController::class, 'process'])->name('otp.process');


Route::post("/products/{product}/comment", [CommentController::class, 'store'])->name('comment.store');


// Cart Routes:
Route::resource("cart", CartController::class);
