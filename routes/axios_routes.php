<?php

use App\Http\Controllers\admin\AdminCompanyNamesController;
use App\Http\Controllers\admin\AdminEducationController;
use App\Http\Controllers\admin\AdminExperienceController;
use App\Http\Controllers\admin\AdminJobTitleController;
use App\Http\Controllers\admin\AdminLocationController;
use App\Http\Controllers\admin\AdminSkillsController;
use App\Http\Controllers\admin\JobsFilterController;
use App\Http\Controllers\admin\JobTypeController;
use App\Http\Controllers\front\HomeController;
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
    'auth:sanctum',
    'verifyUser',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // company store
    Route::post("/axios/admin/company/store", [AdminCompanyNamesController::class, 'ajaxStore']);

    // skill store
    Route::post("/axios/admin/skill/store", [AdminSkillsController::class, 'ajaxStore']);

    // education store
    Route::post("/axios/admin/education/store", [AdminEducationController::class, 'ajaxStore']);

    // location store
    Route::post("/axios/admin/location/store", [AdminLocationController::class, 'ajaxStore']);

    // experience store
    Route::post("/axios/admin/experience/store", [AdminExperienceController::class, 'ajaxStore']);

    // job title store
    Route::post("/axios/admin/job-title/store", [AdminJobTitleController::class, 'ajaxStore']);

    // job type store
    Route::post("/axios/admin/job-type/store", [JobTypeController::class, 'ajaxStore']);
});


// FRONT END AXIOS ROUTES

Route::post("/filter/jobs", [JobsFilterController::class, 'filterJobs']);
