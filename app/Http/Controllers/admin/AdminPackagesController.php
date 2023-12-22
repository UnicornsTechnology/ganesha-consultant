<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Packages;
use App\Models\StudentPackages;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::where('isActive', 'active')->latest()->paginate(10);
        $packages_trashed = Packages::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/job_packages/index', compact('packages', 'packages_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/job_packages/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $packages = new Packages();
        $packages->package_name = $request->package_name;
        $packages->package_links_quantity = $request->package_links_quantity;
        $packages->package_amount = $request->package_amount;
        $packages->package_amount_offered = $request->package_amount_offered;
        $packages->description = $request->description;
        $packages->save();
        return redirect("/admin/package/list")->with('msg', 'Packages has been created successfully !');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Packages  $Packages
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $packages)
    {
        return view('back/admin/settings/job_packages/show', compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Packages  $Packages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = Packages::find($id);
        return view('back/admin/settings/job_packages/edit', compact('packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\$Packages  $Packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $packages = Packages::find($request->package_id);
        $packages->package_name = $request->package_name;
        $packages->package_links_quantity = $request->package_links_quantity;
        $packages->package_amount = $request->package_amount;
        $packages->package_amount_offered = $request->package_amount_offered;
        $packages->description = $request->description;
        $packages->save();
        return redirect("/admin/package/list")->with('msg', 'package has been created successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\$Packages  $Package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $job_type)
    {
        $job_type->delete();
        return redirect()->route('job_type.index');
    }
    public function moveToTrash($id)
    {
        $job_type = Packages::find($id);
        $job_type->isActive = "inactive";
        $job_type->save();
        return redirect('/admin/package/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $job_type = Packages::find($id);
        $job_type->isActive = "active";
        $job_type->save();
        return redirect('/admin/package/list')->with('msg', 'Package restored successfully !');
    }

    public function assignPackage()
    {
        $studentsList = User::where('user_type', 'student')->get();
        $packagesList = Packages::where('isActive', 'active')->get();
        return view('back/admin/settings/job_packages/assign__pkg/create', compact('studentsList', 'packagesList'));
    }
    public function assignPackageToStudent(Request $request)
    {
        $storePackage = new StudentPackages();
        $storePackage->student_package_package_id = $request->package_id;
        $storePackage->student_package_student_id = $request->student_id;
        $storePackage->save();
        return redirect("/admin/assign-packages/list")->with("msg", "Package has been assigned successfully !");
    }
    public function editAssignedPackage($id)
    {
        $packageDetails = StudentPackages::find($id);
        $studentsList = User::where('user_type', 'student')->get();
        $packagesList = Packages::where('isActive', 'active')->get();
        return view('back/admin/settings/job_packages/assign__pkg/edit', compact('studentsList', 'packagesList', 'packageDetails'));
    }
    public function updateAssignedPackage(Request $request)
    {
        $updatePackage = StudentPackages::find($request->student_package_id);
        $updatePackage->student_package_package_id = $request->package_id;
        $updatePackage->student_package_student_id = $request->student_id;
        $updatePackage->save();
        return redirect("/admin/assign-packages/list")->with("msg", "Package has been updated successfully !");
    }
    public function assignedPackagesList()
    {
        $data = StudentPackages::join('users', 'users.id', 'student_packages.student_package_student_id')
            ->join('packages', 'packages.package_id', 'student_packages.student_package_package_id')
            ->latest('student_packages.created_at')->get();
        return view('back/admin/settings/job_packages/assign__pkg/index', compact('data'));
    }
}
