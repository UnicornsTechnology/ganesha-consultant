<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $successStory = SuccessStory::get();
        return view('admin/success_story/index', compact('successStory'));
    }

    public function create()
    {
        return view('admin/success_story/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ss_name' => 'required',
            'ss_location' => 'required',
        ]);

        $data = [
            'ss_name' => $request->input('ss_name'),
            'ss_location' => $request->input('ss_location'),
            'ss_image' => $this->uploadSuccessStoryPic($request, 'ss_image')
        ];

        SuccessStory::create($data);

        return redirect('admin/success-story/list')->with('success', 'Success Story created successfully!');
    }
    protected function uploadSuccessStoryPic($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "image_{$name}.{$extension}";

            $file->move(public_path('uploads/success_story'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function edit($id)
    {
        $successStory = SuccessStory::where('ss_id', $id)->firstOrFail();
        return view('admin/success_story/edit', compact('successStory', 'id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ss_name' => 'required',
            'ss_location' => 'required',
        ]);

        $successStory = SuccessStory::where('ss_id', $request->ss_id)->firstOrFail();

        $data = [
            'ss_name' => $request->input('ss_name'),
            'ss_location' => $request->input('ss_location'),
            'ss_image' => $this->uploadSuccessStoryPic($request, 'ss_image') ?? $successStory->ss_image,
        ];

        $successStory->update($data);

        return redirect('admin/success-story/list')->with('success', 'Success Story updated successfully!');
    }

    public function trash($id)
    {
        $successStory = SuccessStory::where('ss_id', $id)->firstOrFail();
        $successStory->is_active =  $successStory->is_active == "Active" ? "Inactive" : "Active";
        $successStory->save();
        return redirect('admin/success-story/list')->with('success', 'Success Story status updated!');
    }
}
