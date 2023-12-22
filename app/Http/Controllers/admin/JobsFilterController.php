<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\Jobs;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobsFilterController extends Controller
{
    public function filterJobs(Request $request)
    {
        $jobsList = Jobs::query();
        $jobsList->join('company_names', 'company_names.company_name_id', 'jobs.job_company_id')
            ->join('job_titles', 'job_titles.job_title_id', 'jobs.job_job_title_id')
            ->join('locations', 'locations.location_id', 'jobs.job_location_id')
            ->join('experiences', 'experiences.experiences_id', 'jobs.job_experience_id')
            ->join('job_types', 'job_types.job_type_id', 'jobs.job_type_id')
            ->where('isJobActive', 'active')
            ->latest('jobs.created_at');

        if ($request->jobTypes) {
            $jobsList->whereIn('job_types.job_type_id', $request->jobTypes);
        }
        if ($request->categories) {
            $data = JobTitle::where(function ($query) use ($request) {
                foreach ($request->categories as $category) {
                    $query->orWhere('job_category_ids', 'LIKE', '%"' . $category . '"%');
                }
            })->get();
            $arrays = [];
            foreach ($data as $item) {
                $arrays[] = $item->job_title_id;
            }
            $jobsList->whereIn('job_titles.job_title_id', $arrays)->get();
        }

        if ($request->locations) {
            $jobsList->whereIn('locations.location_id', $request->locations);
        }

        if ($request->experiences) {
            $jobsList->whereIn('experiences.experiences_id', $request->experiences);
        }
        return $jobsList->paginate(10);
    }
}
