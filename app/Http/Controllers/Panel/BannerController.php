<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Panel\Banner;
use Services\Uploader\Uploader;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('panel.banner.index', compact('banners'));

    }

    public function create()
    {
        return view('panel.banner.create');
    }

    public function edit(Banner $banner)
    {
        return view('panel.banner.edit', compact('banner'));
    }

    public function store(Request $request)
    {
        $image = Uploader::upload($request->image, '/images/banner/');
        Banner::create([
            "image" => $image,
            "title" => $request->title,
            "text" => $request->text,
            "priority" => $request->priority,
            "is_active" => $request->is_active,
            "type" => $request->type,
            "button_text" => $request->button_text,
            "button_link" => $request->button_link,
            "button_icon" => $request->button_icon
        ]);
        alert()->success('بنر با موفقیت ایجاد شد');
        return redirect()->back();
    }

    public function update(Banner $banner, Request $request)
    {
        $data = [
            "title" => $request->title,
            "text" => $request->text,
            "priority" => $request->priority,
            "is_active" => $request->is_active,
            "type" =>  $request->type,
            "button_text" =>  $request->button_text,
            "button_link" =>  $request->button_link,
            "button_icon" =>  $request->button_icon
        ];

        if (isset($request->image)) {
            $image = Uploader::upload($request->image, '/images/banner/');
            $data['image'] = $image;
        }

        $banner->update($data);
        alert()->success('بنر با موفقیت بروز رسانی شد');
        return redirect()->back();
    }
}
