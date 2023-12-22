<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\student\StudentDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// prevent new users  from registring

Route::get("/register", function () {
    return redirect('/student/login');
});
Route::get("/login", function () {
    return redirect('/student/login');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/job/search/list', [HomeController::class, 'searchJob']);
Route::get('/blog-details/{slug}', [HomeController::class, 'blogDetails']);
Route::get('/jobs-list', [HomeController::class, 'jobsList']);
Route::get('/job-details/{slug}/{id}', [HomeController::class, 'jobDetails']);
Route::get('/about-us', [HomeController::class, 'about']);
Route::get('/contact-us', [HomeController::class, 'contact']);
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions']);
Route::get('/privacy-policy', [HomeController::class, 'privacyAndPolicy']);
Route::get("/student/login", [AuthController::class, 'login']);
Route::get("/student/register", [AuthController::class, 'register']);
Route::post("/student/register", [AuthController::class, 'registerStudent']);
Route::get("/packages", [HomeController::class, 'packages']);
Route::get("/employee/profile/{id}", [HomeController::class, 'profile']);

Route::get('/dashboard', function () {
    if (Auth::user()->activation_status == "Approved") {
        if (Auth::check() && Auth::user()->user_type == "admin" || Auth::user()->user_type == "employee") {
            return redirect("/admin/dashboard");
        } else {
            return redirect('/student/dashboard');
        }
    } else if (Auth::user()->activation_status == "Pending") {
        auth()->guard('web')->logout();
        return redirect("/student/login")->with('msg', 'Your Activation is still pending !');
    } else {
        auth()->guard('web')->logout();
        return redirect("/student/login")->with('msg', 'Your Activation is rejected by the admin !');
    }
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    // 'auth:sanctum', 'verifyUser',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // STUDENT DASHBOARD ROUTES
    Route::get("/student/dashboard", [StudentDashboardController::class, 'dashboard']);
    Route::get("/student/profile", [StudentDashboardController::class, 'profile']);
    Route::post("/student/profile/update", [StudentDashboardController::class, 'profileUpdate']);
    Route::get("/student/applied-jobs", [StudentDashboardController::class, 'appliedJobs']);
    Route::get("/student/apply-now/{id}", [StudentDashboardController::class, 'apply_now']);
    Route::get("/student/jobs-alert", [StudentDashboardController::class, 'jobsAlert']);
    Route::get("/student/package", [StudentDashboardController::class, 'package']);
    Route::get("/student/package/purchase/{id}", [StudentDashboardController::class, 'purchasePackage']);
    Route::get("/student/bookmarks", [StudentDashboardController::class, 'bookmarks']);
    Route::get("/student/add/bookmark/{id}", [StudentDashboardController::class, 'storeBookmarks']);
    Route::get("/student/delete/bookmarks/{id}", [StudentDashboardController::class, 'deleteBooksMarks']);
    Route::get("/student/logout", [StudentDashboardController::class, 'logout']);
});
