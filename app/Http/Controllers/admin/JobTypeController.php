<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_type = JobType::where('isActive', 'active')->latest()->paginate(10);
        $job_type_trashed = JobType::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/job_type/index', compact('job_type', 'job_type_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/job_type/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_type = new JobType();
        $job_type->job_type_name = $request->name;
        $job_type->save();
        return redirect("/admin/settings/job-type/list")->with('msg', 'Job Type has been created successfully !');
    }

    public function ajaxStore(Request $request)
    {
        $job_type = new JobType();
        $job_type->job_type_name = $request->key;
        $existingCompany = JobType::where('job_type_name', $request->name)->first();
        if ($existingCompany) {
            return response()->json([
                'error' => 'Job Type already exists',
                'done' => false,
                "data" =>  JobType::where('isActive', 'active')->latest()->get(),
            ], 409,);
        }
        $job_type->save();
        return response()->json(
            [
                'message' => 'Job type Added successfully',
                'done' => true,
                "data" =>  JobType::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\$JobType  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function show(JobType $job_type)
    {
        return view('back/admin/settings/job_type/show', compact('job_type_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\$JobType  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_type = JobType::find($id);
        return view('back/admin/settings/job_type/edit', compact('job_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\$JobType  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $job_type = JobType::find($request->job_type_id);
        $job_type->job_type_name = $request->name;
        $job_type->save();
        return redirect("/admin/settings/job-type/list")->with('msg', 'Job Type has been created successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\$JobType  $jobtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobType $job_type)
    {
        $job_type->delete();
        return redirect()->route('job_type.index');
    }
    public function moveToTrash($id)
    {
        $job_type = JobType::find($id);
        $job_type->isActive = "inactive";
        $job_type->save();
        return redirect('/admin/settings/job-type/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $job_type = JobType::find($id);
        $job_type->isActive = "active";
        $job_type->save();
        return redirect('/admin/settings/job-type/list')->with('msg', 'Job Type restored successfully !');
    }
}
