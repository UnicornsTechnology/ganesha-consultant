<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::get();
        return view('admin/team/index', compact('team'));
    }

    public function create()
    {
        return view('admin/team/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
            'team_role' => 'required',
        ]);

        $data = [
            'team_name' => $request->input('team_name'),
            'team_role' => $request->input('team_role'),
            'team_image' => $this->uploadteamPic($request, 'team_image')
        ];

        Team::create($data);

        return redirect('admin/team/list')->with('success', 'Team created successfully!');
    }
    protected function uploadteamPic($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "image_{$name}.{$extension}";

            $file->move(public_path('uploads/team'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function edit($id)
    {
        $team = Team::where('team_id', $id)->firstOrFail();
        return view('admin/team/edit', compact('team', 'id'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
            'team_role' => 'required',
        ]);

        $team = Team::where('team_id', $request->team_id)->firstOrFail();

        $data = [
            'team_name' => $request->input('team_name'),
            'team_role' => $request->input('team_role'),
            'team_image' => $this->uploadteamPic($request, 'team_image') ?? $team->team_image,
        ];

        $team->update($data);

        return redirect('admin/team/list')->with('success', 'Team updated successfully!');
    }

    public function trash($id)
    {
        $team = Team::where('team_id', $id)->firstOrFail();
        $team->is_active =  $team->is_active == "Active" ? "Inactive" : "Active";
        $team->save();
        return redirect('admin/team/list')->with('success', 'Team status updated!');
    }
}
