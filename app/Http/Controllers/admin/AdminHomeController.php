<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\JobCategory;
use App\Models\JobProvider;
use App\Models\Jobs;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class AdminHomeController extends Controller
{
    public function index()
    {
        $companies_list = [];
        $jobAddedToday = Jobs::join('company_names', 'company_names.company_name_id', 'jobs.job_company_id')
            ->join('job_titles', 'job_titles.job_title_id', 'jobs.job_job_title_id')
            ->join('locations', 'locations.location_id', 'jobs.job_location_id')
            // ->join('skills', 'skills.skill_id', 'jobs.job_skills_id')
            // ->join('education', 'education.education_id', 'jobs.job_education_id')
            ->join('experiences', 'experiences.experiences_id', 'jobs.job_experience_id')
            ->where('isJobActive', 'active')
            ->whereDate('jobs.created_at', today())->get();

        $data = DB::table('tbl_views')
            ->join('jobs', 'jobs.job_id', 'tbl_views.tbl_job_id')
            ->join('job_titles', 'job_titles.job_title_id', 'jobs.job_job_title_id')
            ->join('job_categories', 'job_categories.job_category_id', 'jobs.job_id') // Use the correct column for the join
            ->select('job_titles.job_title_name', 'tbl_views.tbl_job_id', 'job_categories.job_category_name')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('job_titles.job_title_name', 'tbl_views.tbl_job_id', 'job_categories.job_category_name')
            ->get();

        $jobAddedLastWeek = Jobs::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()->subDay()])->count();
        $jobAddedLastMonth = Jobs::whereBetween('created_at', [now()->startOfMonth()->subMonth(), now()->endOfMonth()->subMonth()])->count();
        $allJobsAdded = Jobs::count();
        return view("back/admin/dashboard", compact('data', 'jobAddedToday', 'jobAddedLastWeek', 'jobAddedLastMonth', 'allJobsAdded'));
    }

    public function profile()
    {

        return view('back/admin/profile_up/view');
    }
    public function updated(Request $request)
    {

        $admin =  User::find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password  = Hash::make($request->password);
        }
        $admin->user_type = 'admin';
        $admin->save();
        return redirect()->back()->with('msg', 'Admin Update Successfully !');
    }

    public function career()
    {
        $career = Career::all();
        return view("back/admin/job_seeking/career", compact('career'));
    }

    public function jobProvider()
    {
        $jobProvider = JobProvider::all();
        return view("back/admin/job_seeking/job_provider", compact('jobProvider'));
    }
    public function jobSeeker()
    {
        $jobSeeker = JobSeeker::all();
        return view("back/admin/job_seeking/job_seeker", compact('jobSeeker'));
    }
}
