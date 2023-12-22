<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\tbl_improt_data;
use App\Models\tbl_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImprotDataController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:/admin/improt/index', ['only' => ['index']]);
        $this->middleware('permission:/admin/improt/create', ['only' => ['create']]);
    }
    function index()
    {
        $data = tbl_improt_data::paginate(500);
        return view('/back/admin/improt_data/index', compact('data'));
    }
    function create()
    {
        return view('/back/admin/improt_data/create');
    }
    function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new UsersImport, $request->file('file'));

        return redirect('/admin/improt/index')->with('success', 'Imported Successfully...');
    }
    function View()
    {
        $data = DB::table('tbl_views')
            ->join('jobs', 'jobs.job_id', 'tbl_views.tbl_job_id')
            ->join('job_titles', 'job_titles.job_title_id', 'jobs.job_job_title_id')
            ->select('job_titles.job_title_name', 'tbl_views.tbl_job_id')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('job_titles.job_title_name', 'tbl_views.tbl_job_id')
            ->get();

        return view('/back/admin/count_view/index', compact('data'));
    }
}
