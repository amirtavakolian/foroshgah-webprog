<?php

namespace App\Http\Controllers\Panel;

use App\Models\Panel\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        return view('panel.brand.index');
    }

    public function create()
    {
        return view('panel.brand.create');
    }

    public function store(BrandRequest $request)
    {
        Brand::create([
            "name" => $request->name,
            "is_active" => $request->is_active,
        ]);
        return redirect()->route('brand.index')->with('successfullyCreated', 'برند با موفقیت ایجاد شد');
    }
}
