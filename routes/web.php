<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\BrandController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\AttributeController;


Route::get("/panel", function(){
    return view('panel.index');
});


Route::group(['prefix'=>'panel'], function(){


    Route::resource('brand', BrandController::class);

    Route::resource('attribute', AttributeController::class);
    // Get all attributes for ajax request:
    Route::post('attribute/all', [AttributeController::class, 'all'])->name('attribute.all');

    Route::resource('category', CategoryController::class);


});


Route::get("/amir", function(){
    return view('test');
});
