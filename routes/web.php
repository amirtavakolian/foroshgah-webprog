<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\BrandController;


Route::get("/panel", function(){
    return view('panel.index');
});


Route::group(['prefix'=>'panel'], function(){

    // Brand Routes:
    Route::resource('brand', BrandController::class);


});
