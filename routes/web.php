<?php

use App\Http\Controllers\admin\UserNotificationsController;
use App\Http\Controllers\website\AuthControllerUser;
use App\Http\Controllers\website\ChatController;
use App\Http\Controllers\website\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ---------------------------------------------
Route::get('/', [FrontController::class, 'home']);
Route::get('/about-us', [FrontController::class, 'about']);
Route::get('/brides', [FrontController::class, 'brides']);
Route::get('/grooms', [FrontController::class, 'grooms']);
Route::get('/contact-us', [FrontController::class, 'contact']);
Route::get('/membership-plans', [FrontController::class, 'membership']);
Route::get('/terms-conditions', [FrontController::class, 'termsAndConditions']);
Route::get('/privacy-policy', [FrontController::class, 'privacyPolicy']);
Route::get('/shipping-policy', [FrontController::class, 'shippingPolicy']);
Route::get('/refund-policy', [FrontController::class, 'refundPolicy']);
Route::get('/users/login', [FrontController::class, 'login']);
Route::get('/users/register', [FrontController::class, 'register']);
Route::get('/users/profile/details/{id}', [FrontController::class, 'details']);
Route::get('/users/otp/create', [AuthControllerUser::class, 'OTP']);
Route::post('/web/users/register', [AuthControllerUser::class, 'Register_user']);
Route::post('/web/users/inquriy', [FrontController::class, 'Inquriy']);
Route::get('/get/price/plan/{id}', [AuthControllerUser::class, 'allPanGet']);
Route::get('/get/price/plans/{id}', [AuthControllerUser::class, 'allPanGets']);
Route::post('/purchase/plan/now', [AuthControllerUser::class, 'purchasePlan']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::check() && Auth::user()->user_type == "admin") {
            return redirect("/admin/dashboard");
        } else {
            return redirect('/');
        }
    })->name('dashboard');
});

// Fornt user Middleware
Route::middleware([
    'auth:sanctum',
    'CheckForntUser',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('/');
    })->name('dashboard');

    // AuthController USER DASHBOARD
    Route::get('/users/dashboard', [AuthControllerUser::class, 'dashboards']);
    Route::get('/users/chat-list', [AuthControllerUser::class, 'ChatList']);
    Route::get('/users/interests', [AuthControllerUser::class, 'Interests']);
    Route::get('/users/plan', [AuthControllerUser::class, 'Plan']);
    // PROFILE UPDATE ROUTE
    Route::get('/users/profile/edit', [AuthControllerUser::class, 'ProfileEdit']);
    Route::post('/users/profile/update', [AuthControllerUser::class, 'ProfileUpdate']);
    Route::get('/users/profile/partner/preference', [AuthControllerUser::class, 'PartnerPreference']);
    Route::post('/users/profile/partner/update', [AuthControllerUser::class, 'PartnerPreferenceUpdate']);
    // PASSWORD UPDATE ROUTE
    Route::get('/users/update/password', [AuthControllerUser::class, 'PasswordUpdate']);
    Route::post('/users/update/password', [AuthControllerUser::class, 'CheckAndUpdate']);
    Route::post('/users/update/otp/verify', [AuthControllerUser::class, 'OTP_Number_update']);
    Route::get('/users/update/otp/verify/{obj}', [AuthControllerUser::class, 'page_otp']);

    // PROFILE VIEWS
    Route::get("/users/profile-view", [FrontController::class, 'profileView']);
    Route::get("/users/notifications", [UserNotificationsController::class, 'notificationsList']);
    Route::get('/users/mark-as-read/{notification_id}', [UserNotificationsController::class, 'markAsRead']);

    // CHAT BOT WORKING NOW
    Route::post('/borcast', [ChatController::class, 'borcast']);
    Route::get('/send/interest/{id}', [ChatController::class, 'intersend']);
    Route::get('/send/ststus/{id}/{status}', [ChatController::class, 'changStatus']);
    Route::get('/get/chat/{resiver_id}/{sender_id}', [ChatController::class, 'GetChat']);
});
