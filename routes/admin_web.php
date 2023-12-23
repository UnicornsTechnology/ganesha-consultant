<?php

use App\Http\Controllers\admin\AdminBlogController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\admin\AdminStudentsListController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\ImprotDataController;
use App\Http\Controllers\admin\RulesController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\WhatsAppTemplatesController;
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

Route::middleware([
    'auth:web', 'verifyUser',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // ================================ DASHBOARD ROUTES ============================
    Route::get('/admin/dashboard', [AdminHomeController::class, 'index']);

    // INPORT DATA
    Route::get('/admin/improt/index', [ImprotDataController::class, 'index']);
    Route::get('/admin/improt/create', [ImprotDataController::class, 'create']);
    Route::post('/admin/improt/store', [ImprotDataController::class, 'store']);

    // Most View Jobs
    Route::get('/admin/most_view/job', [ImprotDataController::class, 'View']);

    // ================================ JOB ROUTES ============================
    Route::get('/admin/jobs/list', [AdminJobController::class, 'index']);
    Route::get('/admin/job/create', [AdminJobController::class, 'create']);
    Route::post('/admin/job/store', [AdminJobController::class, 'store']);
    Route::get('/admin/job/view/{id}', [AdminJobController::class, 'show']);
    Route::get('/admin/job/edit/{id}', [AdminJobController::class, 'edit']);
    Route::post('/admin/job/update/{id}', [AdminJobController::class, 'update']);
    Route::get('/admin/job/status/update/{type}/{id}', [AdminJobController::class, 'updateStatus']);

    // ================================ Employee ROUTES ============================
    Route::get('/admin/employee/list', [EmployeeController::class, 'index']);
    Route::get('/admin/employee/create', [EmployeeController::class, 'create']);
    Route::post('/admin/employee/store', [EmployeeController::class, 'store']);
    Route::get('/admin/employee/view/{id}', [EmployeeController::class, 'show']);
    Route::get('/admin/employee/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/admin/employee/update', [EmployeeController::class, 'update']);
    // ###### TEAM ROUTE ######
    Route::get("/admin/team/index", [TeamController::class, 'index']);
    Route::get("/admin/team/create", [TeamController::class, 'create']);
    Route::post("/admin/team/create", [TeamController::class, 'store']);
    Route::get("/admin/team/edit/{id}", [TeamController::class, 'edit']);
    Route::post("/admin/team/update", [TeamController::class, 'update']);
    Route::get("/admin/team_status/{id}", [TeamController::class, 'status']);
    // user route rules
    Route::get("/admin/roles", [RulesController::class, 'index']);
    Route::get("/admin/roles/create", [RulesController::class, 'create']);
    Route::post("/admin/roles/store", [RulesController::class, 'store']);
    Route::get("/admin/roles/edit/{id}", [RulesController::class, 'edit']);
    Route::post("/admin/roles/update", [RulesController::class, 'update']);
    Route::get("/admin/roles/trash/{id}", [RulesController::class, 'trash']);

    // ================================ Profile ROUTES ============================
    Route::get('/admin/profile', [AdminHomeController::class, 'profile']);
    Route::post('/admin/profile/updated', [AdminHomeController::class, 'updated']);

    // ================================ STUDENT ROUTES ============================
    Route::get("/admin/students/list/{type}", [AdminStudentsListController::class, 'index']);
    Route::get("/admin/student/details/{id}", [AdminStudentsListController::class, 'studentDetails']);
    Route::get("/admin/student/activation-status/{student_id}/{status}", [AdminStudentsListController::class, 'updateActivationStatus']);
    Route::get("/admin/student/applied-jobs/{id}", [AdminStudentsListController::class, 'studentAppliedJobs']);
    Route::get("/admin/student/bookmarks/{id}", [AdminStudentsListController::class, 'studentBookmarks']);
    Route::get("/admin/student/packages/{id}", [AdminStudentsListController::class, 'studentPackages']);

    // ================================== ADMIN JOB SEEKING, CAREER, PROVIDER ROUETS ========
    Route::get("/admin/career-at-gc", [AdminHomeController::class, 'career']);
    Route::get("/admin/job-provider", [AdminHomeController::class, 'jobProvider']);
    Route::get("/admin/job-seeker", [AdminHomeController::class, 'jobSeeker']);

    Route::get('/admin/delete/career/{id}', [AdminHomeController::class, 'deleteCareer']);
    Route::get('/admin/delete/job-provider/{id}', [AdminHomeController::class, 'deleteJobProvider']);
    Route::get('/admin/delete/job-seeker/{id}', [AdminHomeController::class, 'deleteJobSeeker']);
});
// ================================ Employee ROUTES ============================
Route::post('/admin/contact/store', [EmployeeController::class, 'inquery']);
Route::get('/admin/inquiry/list', [EmployeeController::class, 'inq_index']);
Route::get('/inquiry/delete/{id}', [EmployeeController::class, 'inq_delete']);
