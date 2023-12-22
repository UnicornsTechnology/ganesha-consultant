<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyName;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Jobs;
use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Skills;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:/admin/jobs/list', ['only' => ['index']]);
        $this->middleware('permission:/admin/job/create', ['only' => ['create']]);
        $this->middleware('permission:/admin/job/view/{id}', ['only' => ['show']]);
        $this->middleware('permission:/admin/job/edit/{id}', ['only' => ['edit']]);
        $this->middleware('permission:/admin/job/status/update/{type}/{id}', ['only' => ['updateStatus']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobsList = Jobs::join('company_names', 'company_names.company_name_id', 'jobs.job_company_id')
            ->join('job_titles', 'job_titles.job_title_id', 'jobs.job_job_title_id')
            ->join('locations', 'locations.location_id', 'jobs.job_location_id')
            // ->join('skills', 'skills.skill_id', 'jobs.job_skills_id')
            // ->join('education', 'education.education_id', 'jobs.job_education_id')
            ->join('experiences', 'experiences.experiences_id', 'jobs.job_experience_id')
            ->where('isJobActive', 'active')
            ->latest('jobs.created_at')
            ->paginate(10);
        return view("back/admin/jobs/index", compact('jobsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companiesName = CompanyName::where('isActive', 'active')->latest()->get();
        $locations = Location::where('isActive', 'active')->latest()->get();
        $experiences = Experience::where('isActive', 'active')->latest()->get();
        $skills = Skills::where('isActive', 'active')->latest()->get();
        $education = Education::where('isActive', 'active')->latest()->get();
        $jobTitles = JobTitle::where('isActive', 'active')->latest()->get();
        $jobType = JobType::where('isActive', 'active')->latest()->get();
        return view("back/admin/jobs/create", compact('companiesName', 'locations', 'jobType', 'experiences', 'skills', 'education', 'jobTitles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Jobs();
        $job->job_company_id = $request->company_id;
        $job->job_job_title_id = $request->job_title;
        $job->job_location_id = $request->location_id;
        $job->job_experience_id = $request->experience_id;
        $job->job_skills_id = json_encode($request->skill_id);
        $job->job_education_id = json_encode($request->education_id);
        $job->job_description = $request->job_description;
        $job->job_expiry_date = $request->expiry_date;
        $job->job_package = $request->job_package;
        $job->job_url = $request->job_url;
        $job->job_type_id = $request->job_type__;
        $job->job_posting_date = $request->posting_date;
        $job->save();
        return redirect('/admin/jobs/list')->with("msg", "New job has been created !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jobDetails = Jobs::join('company_names', 'company_names.company_name_id', 'jobs.job_company_id')
            ->join('job_titles', 'job_titles.job_title_id', 'jobs.job_job_title_id')
            ->join('locations', 'locations.location_id', 'jobs.job_location_id')
            ->join('experiences', 'experiences.experiences_id', 'jobs.job_experience_id')
            ->where('jobs.job_id', $id)
            ->latest('jobs.created_at')
            ->first();

        // getting educations

        $structedEducationsData = [];
        $educationArray = json_decode($jobDetails->job_education_id, true);
        for ($i = 0; $i < count($educationArray); $i++) {
            $structedEducationsData[] =  Education::find(json_decode($jobDetails->job_education_id, true)[$i]);
        }
        $structedEducationsData;

        // fetching skills
        $skillsArray = json_decode($jobDetails->job_skills_id, true);
        $structedSkillsData = [];
        for ($i = 0; $i < count($skillsArray); $i++) {
            $structedSkillsData[] =  Skills::find($skillsArray[$i]);
        }
        $structedSkillsData;

        return view("back/admin/jobs/view", compact('jobDetails', 'structedEducationsData', 'structedSkillsData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobType = JobType::where('isActive', 'active')->latest()->get();
        $data = Jobs::find($id);
        $job = json_decode(json_encode($data), true);
        $data['job_type'] = $data['job_type_id'];
        unset($data['job_type_id']);
        $companiesName = CompanyName::where('isActive', 'active')->latest()->get();
        $locations = Location::where('isActive', 'active')->latest()->get();
        $experiences = Experience::where('isActive', 'active')->latest()->get();
        $skills = Skills::where('isActive', 'active')->latest()->get();
        $education = Education::where('isActive', 'active')->latest()->get();
        $jobTitles = JobTitle::where('isActive', 'active')->latest()->get();
        $job_skills_id  = json_decode($data->job_skills_id);
        $job_education_id  = json_decode($data->job_education_id);
        return view("back/admin/jobs/edit", compact('job_skills_id', 'job_education_id', 'companiesName', 'locations', 'experiences', 'skills', 'education', 'jobTitles', 'data', 'jobType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Jobs::find($id);
        $job->job_company_id = $request->company_id;
        $job->job_job_title_id = $request->job_title;
        $job->job_location_id = $request->location_id;
        $job->job_experience_id = $request->experience_id;
        $job->job_skills_id = $request->skill_id;
        $job->job_type_id = $request->job_type__;
        $job->job_education_id = $request->education_id;
        $job->job_description = $request->job_description;
        $job->job_expiry_date = $request->expiry_date;
        $job->job_posting_date = $request->posting_date;
        $job->save();
        return redirect()->back();
    }

    /**
     * Updating the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($type, $id)
    {
        $data = Jobs::find($id);
        $data->isJobFeatured = $type;
        $data->save();
        return redirect()->back()->with('msg', 'Job status has been updated !');
    }
}
