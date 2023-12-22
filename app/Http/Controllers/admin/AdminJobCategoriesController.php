<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class AdminJobCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_categories = JobCategory::where('isActive', 'active')->latest()->paginate(10);
        $job_categories_trashed = JobCategory::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/job_categories/index', compact('job_categories', 'job_categories_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_titles = JobTitle::where('isActive', 'active')->get();
        return view('back/admin/settings/job_categories/create', compact('job_titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_categories = new JobCategory;
        $job_categories->job_category_name = $request->name;
        $job_categories->job_category_slug = str_replace(" ", "-", strtolower($request->name));
        $job_categories->save();
        // find job titles associated with the id's
        for ($i = 0; $i < count($request->job_titles_id); $i++) {
            $singleJobtitle = JobTitle::find($request->job_titles_id[$i]);
            $old_data =  json_decode($singleJobtitle->job_category_ids, true);
            if ($old_data == null) {
                $singleJobtitle->job_category_ids = "[\"" . $job_categories->job_category_id . "\"]";
            } else {
                $json_data =  json_decode($singleJobtitle->job_category_ids);
                $json_data[] = $job_categories->job_category_id;
                $singleJobtitle->job_category_ids = $json_data;
            }
            $singleJobtitle->save();
        }

        return redirect("/admin/settings/job-categories/list")->with('msg', 'Job Category has been created successfully !');
    }
    public function ajaxStore(Request $request)
    {
        $jobCategory = new JobCategory();
        $jobCategory->job_category_name = $request->key;
        $jobCategory->job_category_slug = str_replace(" ", "-", strtolower($request->key));
        $existingCatTitle =   JobCategory::where('job_category_name', $request->key)->first();
        if ($existingCatTitle) {
            return response()->json([
                'error' => 'Job Category already exists',
                'done' => false,
                "data" =>  JobCategory::where('isActive', 'active')->latest()->get(),
            ], 409,);
        }
        $jobCategory->save();
        return response()->json(
            [
                'message' => 'Job Titles added successfully',
                'done' => true,
                "data" =>  JobCategory::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobCategory  $JobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $job_categories)
    {
        return view('back/admin/settings/job_categories/show', compact('job_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobCategory  $JobCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_titles = JobTitle::where('isActive', 'active')->get();
        $job_category = JobCategory::find($id);
        $all = JobTitle::where('job_category_ids', 'LIKE', '%' . $job_category->job_category_id . '%')->get();
        $jobTitlesList  = [];
        for ($i = 0; $i < count($all); $i++) {
            $jobTitlesList[] = $all[$i]->job_title_id;
        }
        return view('back/admin/settings/job_categories/edit', compact('job_category', 'job_titles', 'jobTitlesList'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobCategory  $JobCategory
     * @return \Illuminate\Http\Response
     */
    public function updateJobTitles(Request $request)
    {
        $jobCategory  = JobCategory::find($request->job_category_id);
        $jobCategory->job_category_name = $request->name;
        $jobCategory->job_category_slug = str_replace(" ", "-", strtolower($request->name));
        $jobCategory->save();
        // get all data with that category id and remove
        for ($i = 0; $i < count($request->job_titles_id); $i++) {
            $singleJobtitle = JobTitle::find($request->job_titles_id[$i]);
            $old_data =  json_decode($singleJobtitle->job_category_ids, true);
            if ($old_data == null) {
                $singleJobtitle->job_category_ids = "[\"" . $jobCategory->job_category_id . "\"]";
            } else {
                $json_data =  json_decode($singleJobtitle->job_category_ids);
                array_push($json_data, "{$jobCategory->job_category_id}");
                $singleJobtitle->job_category_ids = array_unique($json_data);
            }
            $singleJobtitle->save();
        }

        return redirect()->back();
        return redirect("/admin/settings/job-categories/list")->with('msg', 'Job Category has been updated successfully !');
    }

    public function removeJobTitles(Request $request)
    {
        $jobCategory  = JobCategory::find($request->job_category_id);
        $jobCategory->job_category_name = $request->name;
        $jobCategory->job_category_slug = str_replace(" ", "-", strtolower($request->name));
        $jobCategory->save();
        // return $request;
        $all = JobTitle::where('job_category_ids', 'LIKE', '%' . $jobCategory->job_category_id . '%')->get();
        foreach ($all as $item) {
            // check if the value coming from the request matches any of the variables
            if (in_array($item->job_title_id, $request->job_titles_id)) {
            } else {
                $idTHatNeedToBeRemoved = $jobCategory->job_category_id;
                $singleJobtitle = JobTitle::find($item->job_title_id);
                $oldData =  json_decode($singleJobtitle->job_category_ids);
                for ($i = 0; $i < count($oldData); $i++) {
                    if ($oldData[$i] == $idTHatNeedToBeRemoved) {
                        unset($oldData[$i]);
                    }
                    if (count($oldData) == 0) {
                        $singleJobtitle->job_category_ids = null;
                    }
                }
                $singleJobtitle->job_category_ids = json_encode($oldData);
                $singleJobtitle->save();
            }
        }
        return redirect()->back();
        return redirect("/admin/settings/job-categories/list")->with('msg', 'Job Category has been updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobCategory  $JobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $job_categories)
    {
        $job_categories->delete();
        return redirect()->route('job_categories.index');
    }
    public function moveToTrash($id)
    {
        $jobCategory  = JobCategory::find($id);
        $jobCategory->isActive = "inactive";
        $jobCategory->save();
        return redirect('/admin/settings/job-categories/list')->with('msg', 'Moved to trashed successfully !');
    }

    public function restoreFromTrash($id)
    {
        $jobCategory  = JobCategory::find($id);
        $jobCategory->isActive = "active";
        $jobCategory->save();
        return redirect('/admin/settings/job-categories/list')->with('msg', 'Job Category restored successfully !');
    }
}
