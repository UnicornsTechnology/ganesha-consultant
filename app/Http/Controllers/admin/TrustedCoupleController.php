<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TrustedCouple;
use Illuminate\Http\Request;

class TrustedCoupleController extends Controller
{
    public function index()
    {
        $trustedCouple = TrustedCouple::get();
        return view('admin/trusted_couples/index', compact('trustedCouple'));
    }

    public function create()
    {
        return view('admin/trusted_couples/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tc_name' => 'required',
            'tc_location' => 'required',
            'tc_review' => 'required',
        ]);

        $data = [
            'tc_name' => $request->input('tc_name'),
            'tc_review' => $request->input('tc_review'),
            'tc_location' => $request->input('tc_location'),
            'tc_image' => $this->uploadTrustedCouple($request, 'tc_image')
        ];

        TrustedCouple::create($data);

        return redirect('admin/trusted-couples/list')->with('success', 'Success Story created successfully!');
    }
    protected function uploadTrustedCouple($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "image_{$name}.{$extension}";

            $file->move(public_path('uploads/trusted-couples'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function edit($id)
    {
        $trustedCouple = TrustedCouple::where('tc_id', $id)->firstOrFail();
        return view('admin/trusted_couples/edit', compact('trustedCouple', 'id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tc_name' => 'required',
            'tc_location' => 'required',
            'tc_review' => 'required',
        ]);

        $trustedCouple = TrustedCouple::where('tc_id', $request->tc_id)->firstOrFail();

        $data = [
            'tc_name' => $request->input('tc_name'),
            'tc_review' => $request->input('tc_review'),
            'tc_location' => $request->input('tc_location'),
            'tc_image' => $this->uploadTrustedCouple($request, 'tc_image') ?? $trustedCouple->tc_image,
        ];

        $trustedCouple->update($data);

        return redirect('admin/trusted-couples/list')->with('success', 'Success Story updated successfully!');
    }

    public function trash($id)
    {
        $trustedCouple = TrustedCouple::where('tc_id', $id)->firstOrFail();
        $trustedCouple->is_active =  $trustedCouple->is_active == "Active" ? "Inactive" : "Active";
        $trustedCouple->save();
        return redirect('admin/trusted-couples/list')->with('success', 'Success Story status updated!');
    }
}
