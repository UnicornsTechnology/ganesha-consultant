<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        return view('admin.banner.index', compact('banner'));
    }

    public function create()
    {
        return view('admin/banner/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_name' => 'required',
            'banner_tagline' => 'required',
        ]);

        $data = [
            'banner_name' => $request->input('banner_name'),
            'banner_tagline' => $request->input('banner_tagline'),
            'banner_image' => $this->uploadBannerPic($request, 'banner_image')
        ];

        Banner::create($data);

        return redirect('admin/banner/list')->with('success', 'Banner created successfully!');
    }
    protected function uploadBannerPic($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "image_{$name}.{$extension}";

            $file->move(public_path('uploads/banner'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function edit($id)
    {
        $banner = Banner::where('banner_id', $id)->firstOrFail();
        return view('admin/banner/edit', compact('banner', 'id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'banner_name' => 'required',
            'banner_tagline' => 'required',
        ]);

        $Banner = Banner::where('banner_id', $request->banner_id)->firstOrFail();

        $data = [
            'banner_name' => $request->input('banner_name'),
            'banner_tagline' => $request->input('banner_tagline'),
            'banner_image' => $this->uploadBannerPic($request, 'banner_image') ?? $Banner->banner_image,
        ];

        $Banner->update($data);

        return redirect('admin/banner/list')->with('success', 'Banner updated successfully!');
    }

    public function trash($id)
    {
        $Banner = Banner::where('banner_id', $id)->firstOrFail();
        $Banner->is_active =  $Banner->is_active == "Active" ? "Inactive" : "Active";
        $Banner->save();
        return redirect('admin/banner/list')->with('success', 'Banner status updated!');
    }
}
