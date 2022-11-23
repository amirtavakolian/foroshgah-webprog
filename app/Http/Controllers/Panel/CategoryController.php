<?php

namespace App\Http\Controllers\Panel;

use App\Models\Panel\Category;
use App\Models\Panel\Attribute;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('panel.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('panel.category.create', compact('categories', 'attributes'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $categoryID = Category::create([
            "name" => $request->name,
            "slug" => $request->slug,
            "parent_id" => $request->parent_id,
            "is_active" => $request->is_active,
            "icon" => $request->icon,
            "description" => $request->description
        ]);

        foreach ($request->attribute_ids as $attribute) {
            if (in_array($attribute, $request->attribute_is_filter_ids)) {
                $categoryID->attributes()->attach($categoryID, ['attribute_id' => $attribute, 'is_filter' => 1, 'is_variation' => 0]);
            } else {
                $categoryID->attributes()->attach($categoryID, ['attribute_id' => $attribute, 'is_filter' => 0, 'is_variation' => 1]);
            }
        }
        Alert::success('', 'دسته بندی با موفقیت ایجاد شد');
        return redirect()->route('category.index');
    }
}
