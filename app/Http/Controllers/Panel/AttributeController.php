<?php

namespace App\Http\Controllers\Panel;

use App\Models\Panel\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AttributeUpdateRequest;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return view('panel.attribute.index', compact('attributes'));
    }

    public function create()
    {
        return view('panel.attribute.create');
    }

    public function edit(Attribute $attribute)
    {
        return view('panel.attribute.edit', compact('attribute'));
    }

    public function update(AttributeUpdateRequest $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        Alert::success('', 'برند با موفقیت آپدیت شد');
        return redirect()->route('attribute.index');
    }

    public function store(AttributeRequest $request)
    {
        foreach ($request->name as $value) {
            Attribute::create(['name' => $value]);
        }
        Alert::success('', 'ویژگی با موفقیت ایجاد شد');
        return redirect()->route('attribute.index');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
    }

    public function all()
    {
        return Attribute::all();
    }
}
