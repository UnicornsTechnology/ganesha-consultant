<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_employee_profile;
use App\Models\tbl_inquery;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:/admin/employee/list', ['only' => ['index']]);
        $this->middleware('permission:/admin/employee/create', ['only' => ['create']]);
        $this->middleware('permission:/admin/employee/view/{id}', ['only' => ['show']]);
        $this->middleware('permission:/admin/employee/edit/{id}', ['only' => ['edit']]);
    }
    public function index()
    {
        $employee = tbl_employee_profile::where('isActive', 'active')->latest()->get();
        return view('back/admin/employee/index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/employee/create');
    }
    public function store(Request $request)
    {
        $blog = new tbl_employee_profile();
        $blog->emp_name = $request->emp_name;
        $blog->working_potion = $request->working_potion;
        $blog->package_amount = $request->package_amount;
        $blog->package_amount = $request->package_amount;
        $blog->location = $request->location;
        $blog->education = $request->education;
        $blog->description = $request->description;
        if ($request->file('emp_img')) {
            $file =  $request->file('emp_img');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/employee_images/', $filename);
            $blog->emp_img = $filename;
        }
        $blog->save();
        return redirect("/admin/employee/list")->with('msg', 'Employee has been created successfully !');
    }
    public function edit($id)
    {
        $emp = tbl_employee_profile::find($id);
        return view('back/admin/employee/edit', compact('emp'));
    }
    public function update(Request $request)
    {
        $blog = tbl_employee_profile::find($request->employee_id);
        $blog->emp_name = $request->emp_name;
        $blog->working_potion = $request->working_potion;
        $blog->package_amount = $request->package_amount;
        $blog->package_amount = $request->package_amount;
        $blog->location = $request->location;
        $blog->education = $request->education;
        $blog->description = $request->description;
        if ($request->file('emp_img')) {
            $file =  $request->file('emp_img');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/employee_images/', $filename);
            $blog->emp_img = $filename;
        }
        $blog->save();
        return redirect("/admin/employee/list")->with('msg', 'Employee Update Record successfully !');
    }
    public function show($id)
    {
        $blog = tbl_employee_profile::find($id);
        return view('back/admin/employee/view', compact('blog'));
    }
    public function inquery(Request $request)
    {
        $contact = new tbl_inquery();
        $contact->name = $request->name;
        $contact->mobile_no = $request->mobile_no;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('msg', 'Contact Message Send Successfully !');
    }

    public function inq_index()
    {

        $inquiry = tbl_inquery::get();
        return view('back/admin/inquiry/index', compact('inquiry'));
    }

    public function inq_delete($inq_id)
    {
        $inquiry = tbl_inquery::find($inq_id);
        $inquiry->delete();
        return redirect("admin/inquiry/list")->with("msg", "Inquiry Has Been Deleted Successfully !");
    }
}
