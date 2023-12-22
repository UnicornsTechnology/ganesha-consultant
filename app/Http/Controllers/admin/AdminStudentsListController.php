<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AppliedJobs;
use App\Models\StudentBooksmarks;
use App\Models\StudentPackages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminStudentsListController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:/admin/students/list/{type}', ['only' => ['index']]);
        $this->middleware('permission:/admin/student/details/{id}', ['only' => ['studentDetails']]);
        $this->middleware('permission:/admin/student/activation-status/{student_id}/{status}', ['only' => ['updateActivationStatus']]);
        $this->middleware('permission:/admin/student/applied-jobs/{id}', ['only' => ['studentAppliedJobs']]);
        $this->middleware('permission:/admin/student/bookmarks/{id}', ['only' => ['studentBookmarks']]);
    }

    public function index($type)
    {
        if ($type == "All") {
            $students = User::join('job_categories', 'job_categories.job_category_id', 'users.job_category_id')->where('users.user_type', 'student')->latest('users.created_at')->get();
        } else {
            $students = User::where('user_type', 'student')->where('activation_status', $type)->latest()->paginate(10);
        }

        return view("back/admin/students/index", compact('students', 'type'));
    }
    public function studentDetails($id)
    {
        $studentDetails = User::find($id);
        return view("back/admin/students/student_details", compact('studentDetails'));
    }
    public function studentAppliedJobs($id)
    {
        $jobsList = AppliedJobs::join('jobs', 'jobs.job_id', 'applied_jobs.aj_job_id',)
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("company_names", "company_names.company_name_id", "jobs.job_company_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->where('applied_jobs.aj_student_id', $id)
            ->latest("applied_jobs.created_at")
            ->paginate(10);
        return view("back/admin/students/applied_jobs/index", compact('jobsList'));
    }
    public function studentPackages($id)
    {
        $packages =  StudentPackages::join("packages", "packages.package_id", "student_packages.student_package_package_id")
            ->where("student_package_student_id", $id)->latest('student_packages.created_at')->get();
        return view("back/admin/students/packages/index", compact('packages'));
    }
    public function studentBookmarks($id)
    {
        $jobsList = StudentBooksmarks::join('jobs', 'jobs.job_id', 'student_booksmarks.sb_job_id',)
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("company_names", "company_names.company_name_id", "jobs.job_company_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->where('student_booksmarks.sb_student_id', $id)
            ->latest("student_booksmarks.created_at")
            ->paginate(10);
        return view("back/admin/students/bookmarks/index", compact('jobsList'));
    }
    public function updateActivationStatus($studentId, $activationStatus)
    {
        $studentDetails = User::find($studentId);
        $studentDetails->activation_status = $activationStatus;
        $studentDetails->save();
        return redirect()->back()->with("msg", "Student activation status has been updated !");
    }
}
