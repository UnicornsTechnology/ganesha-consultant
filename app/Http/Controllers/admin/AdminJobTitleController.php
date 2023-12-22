<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class AdminJobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_titles = JobTitle::where('isActive', 'active')->latest()->paginate(10);
        $job_titles_trashed = JobTitle::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/job_title/index', compact('job_titles', 'job_titles_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_categories = JobCategory::where('isActive', 'active')->latest()->get();
        return view('back/admin/settings/job_title/create', compact('job_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_title = new JobTitle;
        $job_title->job_title_name = $request->name;
        $job_title->job_title_slug = str_replace(" ", "-", strtolower($request->name));
        $job_title->job_category_ids =   json_encode($request->job_categories_id);
        $job_title->save();
        return redirect("/admin/settings/job-title/list")->with('msg', 'Job Title has been created successfully !');
    }
    public function ajaxStore(Request $request)
    {
        $jobTitle = new JobTitle();
        $jobTitle->job_title_name = $request->key;
        $jobTitle->job_title_slug = str_replace(" ", "-", strtolower($request->key));
        $existingjobTitle =   JobTitle::where('job_title_name', $request->key)->first();
        if ($existingjobTitle) {
            return response()->json([
                'error' => 'Job Title already exists',
                'done' => false,
                "data" =>  JobTitle::where('isActive', 'active')->latest()->get(),
            ], 409,);
        }
        $jobTitle->save();
        return response()->json(
            [
                'message' => 'Job Titles added successfully',
                'done' => true,
                "data" =>  JobTitle::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobTitle  $JobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $job_title)
    {
        return view('back/admin/settings/job_title/show', compact('job_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobTitle  $JobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_categories = JobCategory::where('isActive', 'active')->latest()->get();
        $job_title = JobTitle::find($id);
        $categoriesArray = json_decode($job_title->job_category_ids, true);
        return view('back/admin/settings/job_title/edit', compact('job_title', 'job_categories', 'categoriesArray'));
    }
    public function single_display($id)
    {
        $job_categories = JobCategory::where('isActive', 'active')->latest()->get();
        $job_title = JobTitle::find($id);
        $categoriesArray = json_decode($job_title->job_category_ids, true);
        return view('back/admin/settings/job_title/show', compact('job_title', 'job_categories', 'categoriesArray'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobTitle  $JobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $jobTitle  = JobTitle::find($request->job_title_id);
        $jobTitle->job_title_name = $request->name;
        $jobTitle->job_category_ids =   json_encode($request->job_categories_id);
        $jobTitle->job_title_slug = str_replace(" ", "-", strtolower($request->name));
        $jobTitle->save();
        return redirect("/admin/settings/job-title/list")->with('msg', 'Job Title has been updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobTitle  $JobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $job_title)
    {
        $job_title->delete();
        return redirect()->route('job_titles.index');
    }
    public function moveToTrash($id)
    {
        $jobTitle  = JobTitle::find($id);
        $jobTitle->isActive = "inactive";
        $jobTitle->save();
        return redirect('/admin/settings/job-title/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $jobTitle  = JobTitle::find($id);
        $jobTitle->isActive = "active";
        $jobTitle->save();
        return redirect('/admin/settings/job-title/list')->with('msg', 'Job Title restored successfully !');
    }
}
