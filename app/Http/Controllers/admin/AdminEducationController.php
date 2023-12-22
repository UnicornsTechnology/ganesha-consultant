<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class AdminEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::where('isActive', 'active')->latest()->paginate(10);
        $education_trashed = Education::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/education/index', compact('education', 'education_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/education/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education_name = new Education();
        $education_name->education_name = $request->name;
        $education_name->save();
        return redirect('/admin/settings/education/list')->with('msg', 'Education created successfully !');
    }

    public function ajaxStore(Request $request)
    {
        $education = new Education();
        $education->education_name = $request->key;
        $existingEducation = Education::where('education_name', $request->name)->first();
        if ($existingEducation) {
            return response()->json([
                'error' => 'Education already exists',
                'done' => false,
                "data" =>  Education::where('isActive', 'active')->latest()->get(),
            ], 409,);
        }
        $education->save();
        return response()->json(
            [
                'message' => 'Education added successfully',
                'done' => true,
                "data" =>  Education::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $Education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education_name)
    {
        return view('back/admin/settings/education/show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $Education
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::find($id);
        return view('back/admin/settings/education/edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $Education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $education_name = Education::find($request->education_id);
        $education_name->education_name = $request->name;
        $education_name->save();
        return redirect('/admin/settings/education/list')->with('msg', 'Education created successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $Education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education_name)
    {
        $education_name->delete();
        return redirect()->route('back/admin/settings/education/index');
    }
    public function moveToTrash($id)
    {
        $education = Education::find($id);
        $education->isActive = "inactive";
        $education->save();
        return redirect('/admin/settings/education/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $education = Education::find($id);
        $education->isActive = "active";
        $education->save();
        return redirect('/admin/settings/education/list')->with('msg', 'Education restored successfully !');
    }
}
