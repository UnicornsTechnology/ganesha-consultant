<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Education;
use App\Models\Experience;
use App\Models\JobCategory;
use App\Models\JobProvider;
use App\Models\Jobs;
use App\Models\JobSeeker;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Packages;
use App\Models\Skills;
use App\Models\tbl_employee_profile;
use App\Models\tbl_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $emp = tbl_employee_profile::where('isActive', 'active')->latest()->get();
        $categories = JobCategory::where('isActive', 'active')->latest()->get();
        $cities = Location::where('isActive', 'active')->latest()->get();
        if (Auth::check()) {
            $featuredJobs = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->where('job_titles.job_category_ids', 'LIKE', '%' . Auth::user()->job_category__id . '%')
                ->where("isJobActive", "active")
                ->where("isJobFeatured", "featured")
                ->latest("jobs.created_at")
                ->paginate(6);
            $recentlyAdded = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->where("isJobActive", "active")
                ->where("isJobFeatured", "featured")
                ->where('job_titles.job_category_ids', 'LIKE', '%' . Auth::user()->job_category__id . '%')
                ->latest("jobs.created_at")
                ->paginate(6);
        } else {
            $featuredJobs = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->where("isJobActive", "active")
                ->where("isJobFeatured", "featured")
                ->latest("jobs.created_at")
                ->paginate(6);
            $recentlyAdded = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->where("isJobActive", "active")
                ->latest("jobs.created_at")
                ->paginate(6);
        }


        return view("front/index", compact('featuredJobs', 'cities', 'emp', 'recentlyAdded', 'categories'));
    }

    public function searchJob(Request $request)
    {
        $cities = Location::where('isActive', 'active')->latest()->get();
        $categories = JobCategory::latest()->get();
        $jobTypes = JobType::where('isActive', 'active')->get();
        $cities = Location::where('isActive', 'active')->latest()->get();
        $experiences = Experience::where('isActive', 'active')->latest()->get();
        $recentlyAdded = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
            ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
            ->where("isJobActive", "active")
            ->latest("jobs.created_at")
            ->get();
        if (Auth::check()) {
            $searchResults = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->orWhere('locations.location_name', "LIKE", "%{$request->location}%")
                ->where('job_titles.job_title_name', "LIKE", "%{$request->key}%")
                ->orWhere('company_names.company_name', "LIKE", "%{$request->key}%")
                ->where('job_titles.job_category_ids', 'LIKE', '%' . Auth::user()->job_category__id . '%')
                ->paginate(10);
        } else {
            $searchResults = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->orWhere('locations.location_name', "LIKE", "%{$request->location}%")
                ->where('job_titles.job_title_name', "LIKE", "%{$request->key}%")
                ->orWhere('company_names.company_name', "LIKE", "%{$request->key}%")
                ->paginate(10);
        }

        return view("front/job_search", compact("searchResults", "cities", "recentlyAdded", "categories", "jobTypes", "request", "experiences"));
    }

    public function about()
    {
        $emp = tbl_employee_profile::where('isActive', 'active')->latest()->get();

        return view("front/about__us", compact('emp'));
    }
    public function blog()
    {

        // $blogs = Blog::where('isActive', 'active')->latest()->get();
        $blogs = Blog::where('isActive', 'active')->latest()->paginate(2);
        return view("front/blog", compact('blogs'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::where('blog_name_slug', $slug)->first();
        $previousBlog = Blog::where('blog_name_slug', '<', $slug)->orderBy('blog_name_slug', 'desc')->first();
        $nextBlog = Blog::where('blog_name_slug', '>', $slug)->orderBy('blog_name_slug', 'asc')->first();
        return view("front/blog_details", compact('blog', 'previousBlog', 'nextBlog'));
    }

    public function jobsList()
    {
        $cities = Location::where('isActive', 'active')->latest()->get();
        $categories = JobCategory::latest()->get();
        $jobTypes = JobType::where('isActive', 'active')->get();
        $experiences = Experience::where('isActive', 'active')->latest()->get();
        if (Auth::check()) {
            $jobsList = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->where('job_titles.job_category_ids', 'LIKE', '%' . Auth::user()->job_category__id . '%')
                ->where("isJobActive", "active")
                ->latest("jobs.created_at")
                ->paginate(10);
        } else {
            $jobsList = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->where("isJobActive", "active")
                ->latest("jobs.created_at")
                ->paginate(10);
        }
        return view("front/job_list", compact("jobsList", 'cities', 'categories', 'jobTypes', 'experiences'));
    }
    public function jobDetails($slug, $jobId)
    {
        $jobDetails = Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
            ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
            ->where("job_titles.job_title_slug", $slug)
            ->where("jobs.job_id", $jobId)
            ->first();
        $skills = [];
        $skillsIDs = json_decode($jobDetails->job_skills_id, true);
        foreach ($skillsIDs as $key => $skillID) {
            $skills[] = Skills::find($skillID);
        }

        $educationDetails = [];
        $educationIDs = json_decode($jobDetails->job_skills_id, true);
        foreach ($educationIDs as $key => $educationID) {
            $educationDetails[] = Education::find($educationID);
        }

        //  related jobs
        if (Auth::check()) {
            $relatedJobs =   Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->where("isJobActive", "active")
                ->where('job_titles.job_category_ids', 'LIKE', '%' . Auth::user()->job_category__id . '%')
                ->where("job_titles.job_title_name", "LIKE", "%{$jobDetails->job_title_name}%")
                ->latest("jobs.created_at")
                ->paginate(3);
        } else {
            $relatedJobs =   Jobs::join("company_names", "company_names.company_name_id", "jobs.job_company_id")
                ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
                ->join("locations", "locations.location_id", "jobs.job_location_id")
                ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
                ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
                ->where("isJobActive", "active")
                // ->where('job_titles.job_category_ids', 'LIKE', '%' . Auth::user()->job_category__id . '%')
                ->where("job_titles.job_title_name", "LIKE", "%{$jobDetails->job_title_name}%")
                ->latest("jobs.created_at")
                ->paginate(3);
        }
        $check = tbl_view::where('tbl_job_id', $jobId)->where('view_user_id', Auth::id())->first();
        if (!$check) {
            $inc = new tbl_view();
            $inc->tbl_job_id = $jobId;
            $inc->view_user_id = Auth::id();
            $inc->save();
        }

        return view("front/job_single", compact("jobDetails", "skills", "educationDetails", "relatedJobs"));
    }
    public function termsAndConditions()
    {
        return view("front/terms_and_conditions");
    }
    public function refundPolicy()
    {
        return view("front/refund_policy");
    }
    public function faq()
    {
        return view("front/faq");
    }
    public function packages()
    {
        $packages = Packages::where('isActive', 'active')->get();
        return view("front/packages", compact('packages'));
    }
    public function privacyAndPolicy()
    {
        return view("front/privacy_policy");
    }
    public function contact()
    {
        return view("front/contact");
    }
    public function profile($id)
    {
        $emp = tbl_employee_profile::where('isActive', 'active')->get();
        return view("front/employee_profile", compact('emp'));
    }

    public function careerAtGC()
    {
        return view("front.career_at_gc");
    }

    public function storeCareerForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
        ]);

        // Create a new Job instance in the database
        $job = Career::create($validatedData);

        return redirect()->back()->with('msg', "Thanks for showing interest in Ganesha Consultant");
    }

    public function jobProvider()
    {
        $categories = JobCategory::all();
        return view("front.job_provider", compact('categories'));
    }

    public function storeJobProviderForm(Request $request)
    {
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'owner_name' => 'required|string|max:255',
            'job_role' => 'required|string|max:255',
            'job_category' => 'required|string|max:255',
            'institute_name' => 'required|string|max:255',
            'qualification_needed' => 'required|string|max:255',
            'experience_needed' => 'required|string|max:255',
            'monthly_salary' => 'required|numeric',
            'selection_process' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'requirement' => 'required|string',
            'description' => 'required|string',
        ]);

        // Create a new Job instance in the database
        JobProvider::create($validatedData);

        return redirect()->back()->with('msg', "Your response has been stored !");
    }

    public function jobSeeker()
    {
        return view("front.job_seeker");
    }

    public function storeJobSeekerForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'whatsapp_number' => 'required',
            'date_of_birth' => 'required|date',
            'industry' => 'required|string',
            'job_title' => 'required|string',
            'total_experience' => 'required',
            'highest_qualification' => 'required|string',
            'current_salary' => 'required',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'complete_address' => 'required|string',
            'upload_resume' => 'required|mimes:pdf|max:2048',
            'upload_aadhar' => 'required|mimes:pdf|max:2048',
        ]);

        $uploadResumePath = $request->file('upload_resume')->store('uploads/resumes', 'public');
        $uploadAadharPath = $request->file('upload_aadhar')->store('uploads/aadhar', 'public');

        // Add file paths to the validated data
        $validatedData['upload_resume'] = $uploadResumePath;
        $validatedData['upload_aadhar'] = $uploadAadharPath;

        // Create a new PersonalInfo instance and fill it with the validated data
        JobSeeker::create($validatedData);

        return redirect()->back()->with('msg', 'Your response has been stored');
    }
}
