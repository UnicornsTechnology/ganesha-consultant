<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function show()
    {
        return view("admin/profile/profile");
    }
    public function edit()
    {
        return view("admin/profile/edit");
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        if ($request->input('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile("profile_image")) {
            $file = $request->file('profile_image');
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "admin_profile_{$name}.{$extension}";

            $file->move(public_path('uploads/admin'), $fileName);
            $data['main_profile_pic'] = $fileName;
        }

        // Update admin profile
        auth()->user()->update($data);

        return redirect("/admin/profile")->with('msg', 'Admin profile has been updated');
    }
}
