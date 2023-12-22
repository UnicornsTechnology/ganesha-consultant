<?php

use App\Http\Controllers\admin\AdminCompanyNamesController;
use App\Http\Controllers\admin\AdminEducationController;
use App\Http\Controllers\admin\AdminExperienceController;
use App\Http\Controllers\admin\AdminJobCategoriesController;
use App\Http\Controllers\admin\AdminJobTitleController;
use App\Http\Controllers\admin\AdminLocationController;
use App\Http\Controllers\admin\AdminPackagesController;
use App\Http\Controllers\admin\AdminSkillsController;
use App\Http\Controllers\admin\JobTypeController;
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
    'auth:web',
    config('jetstream.auth_session'),
    'verified', 'verifyUser'
])->group(function () {
    // Admin Skills Routes
    Route::get("/admin/settings/job-title/list", [AdminJobTitleController::class, 'index']);

    // Admin Experiences Routes
    Route::get("/admin/settings/experience/list", [AdminExperienceController::class, 'index']);
    Route::get("/admin/settings/experience/create", [AdminExperienceController::class, 'create']);
    Route::post("/admin/settings/experience/store", [AdminExperienceController::class, 'store']);
    Route::get("/admin/settings/experience/edit/{id}", [AdminExperienceController::class, 'edit']);
    Route::post("/admin/settings/experience/update", [AdminExperienceController::class, 'update']);
    Route::get("/admin/settings/experience/move-to-trash/{id}", [AdminExperienceController::class, 'moveToTrash']);
    Route::get("/admin/settings/experience/restore-from-trash/{id}", [AdminExperienceController::class, 'restoreFromTrash']);

    // Admin Skills Routes
    Route::get("/admin/settings/skills/list", [AdminSkillsController::class, 'index']);
    Route::get("/admin/settings/skills/create", [AdminSkillsController::class, 'create']);
    Route::post("/admin/settings/skills/store", [AdminSkillsController::class, 'store']);
    Route::get("/admin/settings/skills/edit/{id}", [AdminSkillsController::class, 'edit']);
    Route::post("/admin/settings/skills/update", [AdminSkillsController::class, 'update']);
    Route::get("/admin/settings/skills/move-to-trash/{id}", [AdminSkillsController::class, 'moveToTrash']);
    Route::get("/admin/settings/skills/restore-from-trash/{id}", [AdminSkillsController::class, 'restoreFromTrash']);

    // Admin Job Title Routes
    Route::get("/admin/settings/job-titles/list", [AdminJobTitleController::class, 'index']);
    Route::get("/admin/settings/job-titles/create", [AdminJobTitleController::class, 'create']);
    Route::post("/admin/settings/job-titles/store", [AdminJobTitleController::class, 'store']);
    Route::get("/admin/settings/job-titles/edit/{id}", [AdminJobTitleController::class, 'edit']);
    Route::get("/admin/settings/job-titles/view/{id}", [AdminJobTitleController::class, 'single_display']);
    Route::post("/admin/settings/job-titles/update", [AdminJobTitleController::class, 'update']);
    Route::get("/admin/settings/job-titles/move-to-trash/{id}", [AdminJobTitleController::class, 'moveToTrash']);
    Route::get("/admin/settings/job-titles/restore-from-trash/{id}", [AdminJobTitleController::class, 'restoreFromTrash']);

    // Admin Job Title Routes
    Route::get("/admin/settings/job-categories/list", [AdminJobCategoriesController::class, 'index']);
    Route::get("/admin/settings/job-categories/create", [AdminJobCategoriesController::class, 'create']);
    Route::post("/admin/settings/job-categories/store", [AdminJobCategoriesController::class, 'store']);
    Route::get("/admin/settings/job-categories/edit/{id}", [AdminJobCategoriesController::class, 'edit']);
    Route::post("/admin/settings/job-categories/add-job-titles", [AdminJobCategoriesController::class, 'updateJobTitles']);
    Route::post("/admin/settings/job-categories/remove-job-titles", [AdminJobCategoriesController::class, 'removeJobTitles']);
    Route::get("/admin/settings/job-categories/move-to-trash/{id}", [AdminJobCategoriesController::class, 'moveToTrash']);
    Route::get("/admin/settings/job-categories/restore-from-trash/{id}", [AdminJobCategoriesController::class, 'restoreFromTrash']);

    // Admin Location Title Routes
    Route::get("/admin/settings/locations/list", [AdminLocationController::class, 'index']);
    Route::get("/admin/settings/locations/create", [AdminLocationController::class, 'create']);
    Route::post("/admin/settings/locations/store", [AdminLocationController::class, 'store']);
    Route::get("/admin/settings/locations/edit/{id}", [AdminLocationController::class, 'edit']);
    Route::post("/admin/settings/locations/update", [AdminLocationController::class, 'update']);
    Route::get("/admin/settings/locations/move-to-trash/{id}", [AdminLocationController::class, 'moveToTrash']);
    Route::get("/admin/settings/locations/restore-from-trash/{id}", [AdminLocationController::class, 'restoreFromTrash']);

    // Admin Company Name Routes
    Route::get("/admin/settings/company-name/list", [AdminCompanyNamesController::class, 'index']);
    Route::get("/admin/settings/company-name/create", [AdminCompanyNamesController::class, 'create']);
    Route::post("/admin/settings/company-name/store", [AdminCompanyNamesController::class, 'store']);
    Route::get("/admin/settings/company-name/edit/{id}", [AdminCompanyNamesController::class, 'edit']);
    Route::post("/admin/settings/company-name/update", [AdminCompanyNamesController::class, 'update']);
    Route::get("/admin/settings/company-name/move-to-trash/{id}", [AdminCompanyNamesController::class, 'moveToTrash']);
    Route::get("/admin/settings/company-name/restore-from-trash/{id}", [AdminCompanyNamesController::class, 'restoreFromTrash']);

    // Admin Education Routes
    Route::get("/admin/settings/education/list", [AdminEducationController::class, 'index']);
    Route::get("/admin/settings/education/create", [AdminEducationController::class, 'create']);
    Route::post("/admin/settings/education/store", [AdminEducationController::class, 'store']);
    Route::get("/admin/settings/education/edit/{id}", [AdminEducationController::class, 'edit']);
    Route::post("/admin/settings/education/update", [AdminEducationController::class, 'update']);
    Route::get("/admin/settings/education/move-to-trash/{id}", [AdminEducationController::class, 'moveToTrash']);
    Route::get("/admin/settings/education/restore-from-trash/{id}", [AdminEducationController::class, 'restoreFromTrash']);

    // Admin Job Type Name Routes
    Route::get("/admin/settings/job-type/list", [JobTypeController::class, 'index']);
    Route::get("/admin/settings/job-type/create", [JobTypeController::class, 'create']);
    Route::post("/admin/settings/job-type/store", [JobTypeController::class, 'store']);
    Route::get("/admin/settings/job-type/edit/{id}", [JobTypeController::class, 'edit']);
    Route::post("/admin/settings/job-type/update", [JobTypeController::class, 'update']);
    Route::get("/admin/settings/job-type/move-to-trash/{id}", [JobTypeController::class, 'moveToTrash']);
    Route::get("/admin/settings/job-type/restore-from-trash/{id}", [JobTypeController::class, 'restoreFromTrash']);

    //    admin packages routes
    Route::get("/admin/package/list", [AdminPackagesController::class, 'index']);
    Route::get("/admin/package/create", [AdminPackagesController::class, 'create']);
    Route::post("/admin/package/store", [AdminPackagesController::class, 'store']);
    Route::get("/admin/package/edit/{id}", [AdminPackagesController::class, 'edit']);
    Route::post("/admin/package/update", [AdminPackagesController::class, 'update']);
    Route::get("/admin/package/move-to-trash/{id}", [AdminPackagesController::class, 'moveToTrash']);
    Route::get("/admin/package/restore-from-trash/{id}", [AdminPackagesController::class, 'restoreFromTrash']);

    // ASSIGN PACKAGE ROUTE
    Route::get("/admin/assign-packages", [AdminPackagesController::class, 'assignPackage']);
    Route::post("/admin/assign-packages-to-student", [AdminPackagesController::class, 'assignPackageToStudent']);
    Route::get("/admin/assign-packages/edit/{id}", [AdminPackagesController::class, 'editAssignedPackage']);
    Route::post("/admin/assign-packages/update", [AdminPackagesController::class, 'updateAssignedPackage']);
    Route::get("/admin/assign-packages/list", [AdminPackagesController::class, 'assignedPackagesList']);
});
