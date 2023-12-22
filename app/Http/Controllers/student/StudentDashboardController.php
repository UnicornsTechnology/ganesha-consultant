<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\AppliedJobs;
use App\Models\DetailedProfile;
use App\Models\JobCategory;
use App\Models\Jobs;
use App\Models\StudentBooksmarks;
use App\Models\StudentPackages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentDashboardController extends Controller
{
    public function dashboard()
    {
        $counts = DB::table('student_booksmarks')
            ->select(
                DB::raw('count(*) as bookmarksCount'),
                DB::raw('(SELECT count(*) FROM student_packages WHERE student_package_student_id = ' . Auth::id() . ') as packagesCount'),
                DB::raw('(SELECT count(*) FROM applied_jobs WHERE aj_student_id = ' . Auth::id() . ') as appliedJobsCount')
            )
            ->where('sb_student_id', Auth::id())
            ->first();

        $recentlyAppliedJobs = AppliedJobs::join('jobs', 'jobs.job_id', 'applied_jobs.aj_job_id',)
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->join("job_types", "job_types.job_type_id", "jobs.job_type_id")
            ->join("experiences", "experiences.experiences_id", "jobs.job_experience_id")
            ->where('applied_jobs.aj_student_id', Auth::id())
            ->latest("applied_jobs.created_at")
            ->paginate(10);

        return view("student/dashboard", compact('counts', 'recentlyAppliedJobs'));
    }
    public function profile()
    {
        $user = User::find(Auth::id());
        $categories = JobCategory::where('isActive', 'active')->get();
        $student = DetailedProfile::where('dp_user_table_id', Auth::id())->first();
        if (!$student) {
            $student = [];
        }
        return view("student/profile/show_profile", compact('student','user','categories'));
    }
 
    public function profileUpdate(Request $request)
    {
         $request;
        $student = User::find($request->id);
        $student->name = $request->full_name;
        $student->mobile_number = $request->mobile_number;
        $student->education = $request->education;
        $student->city = $request->city;
        $student->job_category__id = $request->job_category_id;
        $student->email = $request->email;
        if($student->password != null){
            // $student->password = Hash::make($request->password);
        }
        $student->save();
        return redirect("/student/profile")->with("msg",'Profile Updated');
    }
    // public function profileUpdate(Request $request)
    // {
    //     $isExists = DetailedProfile::where('dp_user_table_id', Auth::id())->count();
    //     if ($isExists == 0) {
    //         $detailedProfile = new DetailedProfile();
    //         $msg = "Your profile has been created successfully";
    //     } else {
    //         $detailedProfile = DetailedProfile::where('dp_user_table_id', Auth::id())->first();
    //         $msg = "Your profile has been updated successfully";
    //     }
    //     // image upload

    //     $detailedProfile->dp_user_table_id = Auth::id();
    //     $detailedProfile->dp_firstname = $request->dp_firstname;
    //     $detailedProfile->dp_middlename = $request->dp_middlename;
    //     $detailedProfile->dp_lastname = $request->dp_lastname;
    //     $detailedProfile->dp_email = $request->dp_email;
    //     $detailedProfile->dp_email_alt = $request->dp_email_alt;
    //     $detailedProfile->dp_mobile_number = $request->dp_profile_image;
    //     $detailedProfile->dp_mobile_number = $request->dp_mobile_number;
    //     $detailedProfile->dp_mobile_number_alt = $request->dp_mobile_number_alt;
    //     $detailedProfile->dp_mobile_number = $request->dp_mobile_number;
    //     $detailedProfile->dp_current_salary = $request->dp_current_salary;
    //     $detailedProfile->dp_expected_salary = $request->dp_expected_salary;
    //     $detailedProfile->dp_experience = $request->dp_experience;
    //     $detailedProfile->dp_age = $request->dp_age;
    //     $detailedProfile->dp_education = $request->dp_education;
    //     $detailedProfile->dp_languages = $request->dp_languages;
    //     $detailedProfile->dp_description = $request->dp_description;
    //     $detailedProfile->dp_facebook_url = $request->dp_facebook_url;
    //     $detailedProfile->dp_github_url = $request->dp_github_url;
    //     $detailedProfile->dp_linkedin_url = $request->dp_linkedin_url;
    //     $detailedProfile->dp_country = $request->dp_country;
    //     $detailedProfile->dp_state = $request->dp_state;
    //     $detailedProfile->dp_district = $request->dp_district;
    //     $detailedProfile->dp_taluka = $request->dp_taluka;
    //     $detailedProfile->dp_city_village = $request->dp_city_village;
    //     $detailedProfile->save();
    //     return redirect()->back()->with("msg", $msg);
    // }
    public function apply_now($id)
    {
        $_id = Crypt::decrypt($id);
        $job = Jobs::find($_id);
        $isExists = AppliedJobs::where('aj_job_id', $_id)->where('aj_student_id', Auth::Id())->count();
        if ($isExists == 0) {
            $appliedJobsData = new AppliedJobs();
            $appliedJobsData->aj_clicked_count = 1;
        } else {
            $appliedJobsData =  AppliedJobs::where('aj_job_id', $_id)->where('aj_student_id', Auth::Id())->first();
            $appliedJobsData->aj_clicked_count = $appliedJobsData->aj_clicked_count + 1;
        }
        $appliedJobsData->aj_job_id = $_id;
        $appliedJobsData->aj_student_id = Auth::id();
        $appliedJobsData->save();
        return redirect($job->job_url);
    }
    public function appliedJobs()
    {
        $list = AppliedJobs::join('jobs', 'jobs.job_id', 'applied_jobs.aj_job_id',)
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->where('applied_jobs.aj_student_id', Auth::id())
            ->latest("applied_jobs.created_at")
            ->paginate(10);
        return view("student/jobs/applied__jobs", compact('list'));
    }
    public function package()
    {
        $packages =  StudentPackages::join("packages", "packages.package_id", "student_packages.student_package_package_id")
            ->where("student_package_student_id", Auth::id())->latest('student_packages.created_at')->get();
        return view("student/package/packages", compact('packages'));
    }
    public function storeBookmarks($id)
    {
        $isExists = StudentBooksmarks::where('sb_job_id', $id)->where('sb_student_id', Auth::Id())->count();
        if ($isExists == 0) {
            $studentBookmarks = new StudentBooksmarks();
        } else {
            $studentBookmarks =  StudentBooksmarks::where('sb_job_id', $id)->where('sb_student_id', Auth::Id())->first();
        }
        $studentBookmarks->sb_job_id = $id;
        $studentBookmarks->sb_student_id = Auth::id();
        $studentBookmarks->save();
        return redirect()->back()->with('msg', 'Bookmark added successfully');
    }
    public function bookmarks()
    {
        $booksmarks = StudentBooksmarks::join('jobs', 'jobs.job_id', 'student_booksmarks.sb_job_id',)
            ->join("job_titles", "job_titles.job_title_id", "jobs.job_job_title_id")
            ->join("locations", "locations.location_id", "jobs.job_location_id")
            ->where('student_booksmarks.sb_student_id', Auth::id())
            ->latest("student_booksmarks.created_at")
            ->paginate(10);
        return view("student/bookmarks/bookmarks_list", compact('booksmarks'));
    }
    public function deleteBooksMarks($id)
    {
        $remove = StudentBooksmarks::find($id);
        $remove->delete();
        return redirect()->back()->with("msg", "Bookmarks deleted successfully");
    }
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect("/student/login");
    }
    public function purchasePackage($id)
    {
        $id =  Crypt::decrypt($id);
        $storePackage = new StudentPackages();
        $storePackage->student_package_package_id = $id;
        $storePackage->student_package_student_id = Auth::id();
        $storePackage->save();
        return redirect("student/package")->with('msg', 'Package purchased successfully');
    }
}
