<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminMemberController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\UserNotificationsController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\ImageGalleryController;
use App\Http\Controllers\admin\MembershipCreatePlan;
use App\Http\Controllers\admin\TrustedCoupleController;
use App\Http\Controllers\admin\SuccessStoryController;
use App\Http\Controllers\admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', function () {
    return view('/admin/login');
});
Route::get('/admin/register', function () {
    return view('/auth/register');
});

// Admin user Middleware
Route::middleware([
    'auth:sanctum',
    'CheckUserType',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
});
