<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inqury;
use App\Models\tbl_membership_plan;
use App\Models\tbl_purchase_plan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {

        $data = [
            "grooms" => User::where('gender', 1)->where('user_type', 'user')->count(),
            "brides" => User::where('gender', 2)->where('user_type', 'user')->count(),
            "total_members" => User::where('user_type', 'user')->count(),
            "plan_purchased_brides" => tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
                ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
                ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
                ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
                ->latest('tbl_prices.created_at')
                ->where('users.gender', 1)
                ->count(),
            "plan_purchased_grooms" => tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
                ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
                ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
                ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
                ->latest('tbl_prices.created_at')
                ->where('users.gender', 2)
                ->count(),
            "current_month_earning" => $currentMonthDataCount = tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
                ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
                ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
                ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
                ->whereMonth('tbl_prices.created_at', now()->month)
                ->latest('tbl_prices.created_at')
                ->sum('tbl_prices.price'),
            "total_earning" => $currentYearDataCount = tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
                ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
                ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
                ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
                ->latest('tbl_prices.created_at')
                ->sum('tbl_prices.price'),
            "plans" => tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
                ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
                ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
                ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
                ->latest('tbl_prices.created_at')
                ->limit(50)
                ->get(),
            "membership_plans" => tbl_membership_plan::where('plan_status', 'active')->count(),
        ];
        $recentlyJoined =  User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name')
            ->leftJoin('cities', 'cities.city_id', 'users.city')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->where('user_type', 'user')->limit(50)->get();
        return view('/admin/dashboard', compact('data', 'recentlyJoined'));
    }

    public function inquiry()
    {
        $inquiry = Inqury::all();
        return view("admin/inquiry/index", compact('inquiry'));
    }

    public function deleteInquiry($id)
    {
        $inquiry = Inqury::findOrFail($id);
        $inquiry->delete();
        return redirect()->back()->with('msg', "Inquiry has been deleted !");
    }
}
