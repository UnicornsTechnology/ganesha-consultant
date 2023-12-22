<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RulesController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:/admin/roles', ['only' => ['index']]);
        $this->middleware('permission:/admin/roles/create', ['only' => ['create']]);
        $this->middleware('permission:/admin/roles/edit/{id}', ['only' => ['edit']]);
        $this->middleware('permission:/admin/roles/trash/{id}', ['only' => ['trash']]);
    }

    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->where('user_access', 0)->paginate(10);
        return view('back/admin/roles/index', compact('roles'));
    }
    public function create()
    {
        $dashboard_permission = Permission::where('list_number', '1')->get();
        $rolesPermissions = Permission::where('list_number', '2')->get();
        $sub_userPermissions = Permission::where('list_number', '3')->get();
        $sourcePermissions = Permission::where('list_number', '4')->get();
        $inquiryforPermissions = Permission::where('list_number', '5')->get();
        $cityPermissions = Permission::where('list_number', '6')->get();
        $educationPermissions = Permission::where('list_number', '7')->get();
        $passing_yearPermissions = Permission::where('list_number', '8')->get();
        return view('back/admin/roles/create', compact('dashboard_permission', 'rolesPermissions', 'sub_userPermissions', 'sourcePermissions', 'inquiryforPermissions', 'cityPermissions', 'educationPermissions', 'passing_yearPermissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect('/admin/roles')->with('msg', 'Role Created Successfully');
    }
    public function edit($id)
    {
        $dashboard_permission = Permission::where('list_number', '1')->get();
        $rolesPermissions = Permission::where('list_number', '2')->get();
        $sub_userPermissions = Permission::where('list_number', '3')->get();
        $sourcePermissions = Permission::where('list_number', '4')->get();
        $inquiryforPermissions = Permission::where('list_number', '5')->get();
        $cityPermissions = Permission::where('list_number', '6')->get();
        $educationPermissions = Permission::where('list_number', '7')->get();
        $passing_yearPermissions = Permission::where('list_number', '8')->get();
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('permissions.id')
            ->toArray();
        return view('back/admin/roles/edit', compact('role', 'rolePermissions', 'dashboard_permission', 'rolesPermissions', 'sub_userPermissions', 'sourcePermissions', 'inquiryforPermissions', 'cityPermissions', 'educationPermissions', 'passing_yearPermissions'));
    }
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($request->role_id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect('/admin/roles')->with('msg', 'Role Updated Successfully');
    }
    public function trash($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect('/admin/roles')->with('success', 'Role deleted successfully');
    }
}
