<?php

namespace App\Http\Controllers;

use App\Models\Panel\Banner;
use App\Models\Panel\Category;
use App\Models\Panel\Product;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $banners = Banner::orderBy('priority');
        $categories = Category::where('parent_id', null)->with('children')->get();
        $products = Product::with(['variations', 'category'])->get();
        return view('index.index', compact('banners', 'categories', 'products'));
    }
}
