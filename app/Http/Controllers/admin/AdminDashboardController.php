<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('/admin/dashboard',);
    }

    public function inquiry()
    {
        // $inquiry = Inqury::all();
        return view("admin/inquiry/index");
    }

    public function deleteInquiry($id)
    {
        // // $inquiry = Inqury::findOrFail($id);
        // $inquiry->delete();
        return redirect()->back()->with('msg', "Inquiry has been deleted !");
    }
}
