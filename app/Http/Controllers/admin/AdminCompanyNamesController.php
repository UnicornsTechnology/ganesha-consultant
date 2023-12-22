<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyName;
use Illuminate\Http\Request;

class AdminCompanyNamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_names = CompanyName::where('isActive', 'active')->latest()->paginate(10);
        $company_names_trashed = CompanyName::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/company_name/index', compact('company_names', 'company_names_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/company_name/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_name = new CompanyName;
        $company_name->company_name = $request->name;
        $company_name->company_name_slug = str_replace(" ", "-", strtolower($request->name));


        if ($request->file('image')) {
            $file =  $request->file('image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/company_logo/', $filename);
            $company_name->company_logo = $filename;
        }

        $company_name->save();
        return redirect("/admin/settings/company-name/list")->with('msg', 'Company Name has been created successfully !');
    }

    public function ajaxStore(Request $request)
    {
        $company_name = new CompanyName;
        $company_name->company_name = $request->key;
        $company_name->company_name_slug = str_replace(" ", "-", strtolower($request->key));
        if ($request->file('image')) {
            $file =  $request->file('image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/company_logo/', $filename);
            $company_name->company_logo = $filename;
        }
        $existingCompany = CompanyName::where('company_name', $request->name)->first();
        if ($existingCompany) {
            return response()->json([
                'error' => 'Company name already exists',
                'done' => false,
                "data" =>  CompanyName::where('isActive', 'active')->latest()->get(),
            ], 409,);
        }
        $company_name->save();
        return response()->json(
            [
                'message' => 'Company added successfully',
                'done' => true,
                "data" =>  CompanyName::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyName  $companyName
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyName $company_name)
    {
        return view('back/admin/settings/company_name/show', compact('company_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyName  $companyName
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_name = CompanyName::find($id);
        return view('back/admin/settings/company_name/edit', compact('company_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyName  $companyName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company_name = CompanyName::find($request->company_name_id);
        $company_name->company_name = $request->company_name;
        $company_name->company_name_slug = str_replace(" ", "-", strtolower($request->company_name));


        if ($request->file('image')) {
            $file =  $request->file('image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/company_logo/', $filename);
            $company_name->company_logo = $filename;
        }
        $company_name->save();
        return redirect("/admin/settings/company-name/list")->with('msg', 'Company Name has been created successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyName  $companyName
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyName $company_name)
    {
        $company_name->delete();
        return redirect()->route('company_names.index');
    }
    public function moveToTrash($id)
    {
        $company_name = CompanyName::find($id);
        $company_name->isActive = "inactive";
        $company_name->save();
        return redirect('/admin/settings/company-name/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $company_name = CompanyName::find($id);
        $company_name->isActive = "active";
        $company_name->save();
        return redirect('/admin/settings/company-name/list')->with('msg', 'Company Name restored successfully !');
    }
}
