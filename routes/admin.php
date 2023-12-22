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


    // ADMIN MEMBERS ROUTES
    Route::get("/admin/all-members", [AdminMemberController::class, 'index']);
    Route::get("/admin/all-grooms", [AdminMemberController::class, 'grooms']);
    Route::get("/admin/all-brides", [AdminMemberController::class, 'brides']);
    Route::get("/admin/member/create", [AdminMemberController::class, 'create']);
    Route::post("/admin/member/store", [AdminMemberController::class, 'store']);
    Route::get("/admin/member/edit/{id}", [AdminMemberController::class, 'edit']);
    Route::post("/admin/member/update", [AdminMemberController::class, 'update']);
    Route::get("/admin/member/show/{id}", [AdminMemberController::class, 'show']);
    Route::get("/admin/member/biodata/{id}", [AdminMemberController::class, 'biodata']);
    Route::get("/admin/member/trash/{id}", [AdminMemberController::class, 'trash']);
    Route::get("/admin/member/lock-status/{id}", [AdminMemberController::class, 'lock']);
    Route::get("/admin/member/activation/{id}", [AdminMemberController::class, 'activation']);
    Route::get("/admin/member/purchased-plans/{id}", [AdminMemberController::class, 'purchasedPlans']);

    Route::get("/admin/member/matches/{id}", [AdminMemberController::class, 'matchesFound']);

    // MEBERSHIP PLANS CREATE ROUTES
    Route::get("/admin/membership/plans-list", [MembershipCreatePlan::class, 'index']);
    Route::get("/admin/membership/plans-create", [MembershipCreatePlan::class, 'create']);
    Route::post("/admin/membership/plans-store", [MembershipCreatePlan::class, 'store']);
    Route::get("/admin/membership/plans-edit/{id}", [MembershipCreatePlan::class, 'edit']);
    Route::post("/admin/membership/plans-update", [MembershipCreatePlan::class, 'update']);
    Route::get("/admin/membership/prices/{id}", [MembershipCreatePlan::class, 'show']);
    Route::get("/admin/membership/plans-trash/{id}", [MembershipCreatePlan::class, 'trash']);


    // MEMBERSHIP PLANS CREATE STUFF
    Route::get("/admin/membership/plans-purchased-list", [AdminMemberController::class, 'plansPurchasedList']);


    // MEBERSHIP PLANS CREATE PRICE
    Route::get("/admin/membership/price-create/{id}", [MembershipCreatePlan::class, 'create_price']);
    Route::post("/admin/membership/price-store", [MembershipCreatePlan::class, 'store_price']);
    Route::get("/admin/membership/price-edit/{id}", [MembershipCreatePlan::class, 'edit_price']);
    Route::post("/admin/membership/price/update", [MembershipCreatePlan::class, 'update_price']);
    Route::get("/admin/membership/price-show/{id}", [MembershipCreatePlan::class, 'show_price']);
    Route::get("/admin/membership/price-trash/{id}", [MembershipCreatePlan::class, 'trash_price']);

    // ADMIN MEMBER FILTER ROUTES
    Route::get("/admin/member/filter", [AdminMemberController::class, 'filter']);

    // INQUIRIES
    Route::get("/admin/inquiries", [AdminDashboardController::class, 'inquiry']);
    Route::get("/admin/inquiry/delete/{id}", [AdminDashboardController::class, 'deleteInquiry']);

    // MATCH MAKING
    Route::get("/admin/match-making", [AdminMemberController::class, 'matchMaking']);

    // IMAGE GALLERY ROUTES
    Route::get("/admin/image-gallery/list", [ImageGalleryController::class, 'index']);
    Route::get("/admin/image-gallery/create", [ImageGalleryController::class, 'create']);
    Route::post("/admin/image-gallery/store", [ImageGalleryController::class, 'store']);
    Route::get("/admin/image-gallery/edit/{id}", [ImageGalleryController::class, 'edit']);
    Route::post("/admin/image-gallery/update", [ImageGalleryController::class, 'update']);
    Route::get("/admin/image-gallery/trash/{id}", [ImageGalleryController::class, 'trash']);

    // IMAGE GALLERY ROUTES
    Route::get("/admin/banner/list", [BannerController::class, 'index']);
    Route::get("/admin/banner/create", [BannerController::class, 'create']);
    Route::post("/admin/banner/store", [BannerController::class, 'store']);
    Route::get("/admin/banner/edit/{id}", [BannerController::class, 'edit']);
    Route::post("/admin/banner/update", [BannerController::class, 'update']);
    Route::get("/admin/banner/trash/{id}", [BannerController::class, 'trash']);

    // TRUSTED COUPLES
    Route::get("/admin/trusted-couples/list", [TrustedCoupleController::class, 'index']);
    Route::get("/admin/trusted-couples/create", [TrustedCoupleController::class, 'create']);
    Route::post("/admin/trusted-couples/store", [TrustedCoupleController::class, 'store']);
    Route::get("/admin/trusted-couples/edit/{id}", [TrustedCoupleController::class, 'edit']);
    Route::post("/admin/trusted-couples/update", [TrustedCoupleController::class, 'update']);
    Route::get("/admin/trusted-couples/trash/{id}", [TrustedCoupleController::class, 'trash']);

    // SUCCESS STORY
    Route::get("/admin/success-story/list", [SuccessStoryController::class, 'index']);
    Route::get("/admin/success-story/create", [SuccessStoryController::class, 'create']);
    Route::post("/admin/success-story/store", [SuccessStoryController::class, 'store']);
    Route::get("/admin/success-story/edit/{id}", [SuccessStoryController::class, 'edit']);
    Route::post("/admin/success-story/update", [SuccessStoryController::class, 'update']);
    Route::get("/admin/success-story/trash/{id}", [SuccessStoryController::class, 'trash']);

    // TEAMS
    Route::get("/admin/team/list", [TeamController::class, 'index']);
    Route::get("/admin/team/create", [TeamController::class, 'create']);
    Route::post("/admin/team/store", [TeamController::class, 'store']);
    Route::get("/admin/team/edit/{id}", [TeamController::class, 'edit']);
    Route::post("/admin/team/update", [TeamController::class, 'update']);
    Route::get("/admin/team/trash/{id}", [TeamController::class, 'trash']);

    // ADMIN NOTIFICATIONS ROUTES
    Route::get('/admin/mark-as-read/{notification_id}', [UserNotificationsController::class, 'markAsRead']);
    Route::get('/admin/mark-all-as-read', [UserNotificationsController::class, 'markAllAsRead']);

    // ADMIN PROFILE
    Route::get("/admin/profile", [AdminProfileController::class, 'show']);
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit']);
    Route::post('/admin/profile/update', [AdminProfileController::class, 'update']);
});
