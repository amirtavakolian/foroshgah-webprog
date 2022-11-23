<?php

namespace App\Http\Controllers\Panel;

use App\Models\Panel\Brand;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('panel.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('panel.brand.create');
    }

    public function edit(Brand $brand)
    {
        return view('panel.brand.edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        Alert::success('', 'برند با موفقیت آپدیت شد');
        return redirect()->route('brand.index');
    }

    public function store(BrandRequest $request)
    {
        Brand::create([
            "name" => $request->name,
            "slug" => $request->slug,
            "is_active" => $request->is_active,
        ]);
        Alert::success('', 'برند با موفقیت ایجاد شد');
        return redirect()->route('brand.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
    }
}
