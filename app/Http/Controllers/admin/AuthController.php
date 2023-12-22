<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view("back/auth/login");
    }
    public function register()
    {
        $categories = JobCategory::where('isActive', 'active')->get();
        return view("back/auth/register", compact('categories'));
    }
    public function registerStudent(Request $request)
    {
        $request->validate([
            'mobile_number' => ['required', 'unique:users,mobile_number'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);
        $student = new User();
        $student->name = $request->full_name;
        $student->mobile_number = $request->mobile_number;
        $student->education = $request->education;
        $student->city = $request->city;
        $student->job_category_id = $request->job_category_id;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect("/student/login")->with('msg', 'You are successfully registered !');
    }
}
