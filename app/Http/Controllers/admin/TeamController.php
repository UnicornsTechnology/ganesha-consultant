<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class TeamController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:/admin/team/index', ['only' => ['index']]);
        $this->middleware('permission:/admin/team/create', ['only' => ['create']]);
        $this->middleware('permission:/admin/team/edit/{id}', ['only' => ['edit']]);
        $this->middleware('permission:/admin/team_status/{id}', ['only' => ['status']]);
    }

    public function index()
    {
        $team = User::latest()
            ->where('user_type', 'employee')
            ->get();
        $trash = User::latest()
            ->where('user_type', 2)
            ->get();
        return view("back/admin/team/index", compact('team', 'trash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('user_access', 0)->get();
        return view("back/admin/team/create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        // return $request;
        $team = new User();
        $team->name = $request->name;
        $team->mobile_number = $request->mobile_no;
        $team->email = $request->email;
        $team->user_type = 'employee';
        $team->activation_status = 'Approved';
        $team->assignRole($request->roles);
        $team->password = Hash::make($request->password);
        $team->save();
        return redirect('admin/team/index')->with("msg", "Employee Created Successfully");
    }


    public function edit($id)
    {
        $team = User::find($id);
        $roless = Role::where('user_access', 0)->get();
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $team->roles->pluck('name', 'name')->all();
        $keys = array_keys($userRole)[0];
        return view("back/admin/team/edit", compact('team', 'roles', 'roless', 'keys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $team)
    {
        $team = User::find($request->id);
        $team->name = $request->name;
        $team->mobile_number = $request->mobile_no;
        $team->email = $request->email;
        $team->user_type = 'employee';
        $team->activation_status = 'Approved';
        DB::table('model_has_roles')->where('model_id', $request->id)->delete();
        $team->assignRole($request->roles);
        if ($request->password) {
            $team->password = Hash::make($request->password);
        }
        $team->save();
        return redirect('/admin/team/index')->with("msg", "Employee Updated Successfully");
    }




    public function status($id)
    {
        $team = User::find($id);
        if ($team->status == "0") {
            $team->status = "1";
        } else {
            $team->status = "0";
        }
        $team->save();
        return redirect()->back()->with("msg", " Status Updated Successfully");
    }
}
