<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $imageGalleries = ImageGallery::get();
        return view('admin.image_gallery.index', compact('imageGalleries'));
    }

    public function create()
    {
        return view('admin/image_gallery/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ig_name' => 'required',
            'ig_tagline' => 'required',
        ]);

        $data = [
            'ig_name' => $request->input('ig_name'),
            'ig_tagline' => $request->input('ig_tagline'),
            'ig_image' => $this->uploadImageGalleryPic($request, 'ig_image')
        ];

        ImageGallery::create($data);

        return redirect('admin/image-gallery/list')->with('success', 'ImageGallery created successfully!');
    }
    protected function uploadImageGalleryPic($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "image_{$name}.{$extension}";

            $file->move(public_path('uploads/image_gallery'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function edit($id)
    {
        $imageGalleries = ImageGallery::where('ig_id', $id)->firstOrFail();
        return view('admin/image_gallery/edit', compact('imageGalleries', 'id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ig_name' => 'required',
            'ig_tagline' => 'required',
        ]);

        $imageGallery = ImageGallery::where('ig_id', $request->ig_id)->firstOrFail();

        $data = [
            'ig_name' => $request->input('ig_name'),
            'ig_tagline' => $request->input('ig_tagline'),
            'ig_image' => $this->uploadImageGalleryPic($request, 'ig_image') ?? $imageGallery->ig_image,
        ];

        $imageGallery->update($data);

        return redirect('admin/image-gallery/list')->with('success', 'ImageGallery updated successfully!');
    }

    public function trash($id)
    {
        $imageGallery = ImageGallery::where('ig_id', $id)->firstOrFail();
        $imageGallery->is_active =  $imageGallery->is_active == "Active" ? "Inactive" : "Active";
        $imageGallery->save();
        return redirect('admin/image-gallery/list')->with('success', 'ImageGallery status updated!');
    }
}
