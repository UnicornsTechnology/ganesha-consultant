<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_membership_plan;
use App\Models\tbl_price;
use Illuminate\Http\Request;

class MembershipCreatePlan extends Controller
{
    public function index()
    {
        $membership_plan = tbl_membership_plan::all();
        return view('admin/membership_plan/index', compact('membership_plan'));
    }

    public function create()
    {
        return view("admin/membership_plan/create");
    }

    public function store(Request $request)
    {
        $plan = tbl_membership_plan::create($request->all());;
        return redirect("/admin/membership/plans-list")->with("msg", "Membership Plan Create Successfully !!");
    }

    public function show($id)
    {
        $plan = tbl_membership_plan::findOrFail($id);
        $prices = tbl_price::where('tbl_plan_id', $id)->get();
        return view('admin/membership_price/index', compact('plan', 'prices'));
    }

    public function edit($id)
    {
        $plan = tbl_membership_plan::findOrFail($id);
        return view('admin/membership_plan/edit', compact('plan'));
    }
    public function update(Request $request)
    {
        $plan = tbl_membership_plan::findOrFail($request->membership_plan_id);
        $plan->update($request->all());
        return redirect("/admin/membership/plans-list")->with("msg", "Membership Plan Update Successfully !!");
    }
    public function trash($id)
    {
        $user = tbl_membership_plan::findOrFail($id);
        if ($user->plan_status == "active") {
            $user->plan_status = "inactive";
        } else {
            $user->plan_status = "active";
        }
        $user->save();
        return redirect()->back()->with('msg', 'Member is now ' . $user->plan_status);
    }

    public function index_price()
    {
        $membership_price = tbl_price::join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', "tbl_prices.tbl_plan_id")->get();
        return view('admin/membership_price/index', compact('membership_price'));
    }

    public function create_price($id)
    {
        $plan = tbl_membership_plan::where("plan_status", "active")->get();
        return view("admin/membership_price/create", compact("plan", 'id'));
    }

    public function store_price(Request $request)
    {
        $plan = tbl_price::create($request->all());;
        return redirect("/admin/membership/prices/" . $request->tbl_plan_id)->with("msg", "Membership Plan price Create Successfully !!");
    }

    public function show_price($id)
    {
        $plan = tbl_membership_plan::where("plan_status", "active")->get();
        $price = tbl_price::findOrFail($id);
        return view('admin/membership_price/view',  compact('price', "plan"));
    }

    public function edit_price($id)
    {
        $plan = tbl_membership_plan::where("plan_status", "active")->get();
        $price = tbl_price::findOrFail($id);
        return view('admin/membership_price/edit', compact('price', "plan"));
    }

    public function update_price(Request $request)
    {
        $plan = tbl_price::findOrFail($request->price_plan_id);
        $plan->update($request->all());
        return redirect("/admin/membership/prices/" . $plan->tbl_plan_id)->with("msg", "Membership price Update Successfully !!");
    }
    public function trash_price($id)
    {
        $user = tbl_price::find($id);
        if ($user->price_status == "active") {
            $user->price_status = "inactive";
        } else {
            $user->price_status = "active";
        }
        $user->save();
        return redirect()->back()->with('msg', 'Member is now ' . $user->price_status);
    }
}
