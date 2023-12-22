<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class AdminSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::where('isActive', 'active')->latest()->paginate(10);
        $skills_trashed = Skills::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/skills/index', compact('skills', 'skills_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/skills/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skills = new Skills();
        $skills->skill_name = $request->name;
        $skills->save();
        return redirect("/admin/settings/skills/list")->with('msg', 'Skill has been created successfully !');
    }

    public function ajaxStore(Request $request)
    {
        $skills = new Skills();
        $skills->skill_name = $request->key;
        $existingSkill = Skills::where('skill_name', $request->key)->first();
        if ($existingSkill) {
            return response()->json([
                'error' => 'Skill already exists',
                'done' => false,
                "data" =>  Skills::where('isActive', 'active')->latest()->get(),
            ], 409,);
        }
        $skills->save();
        return response()->json(
            [
                'message' => 'Skill added successfully',
                'done' => true,
                "data" =>  Skills::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skills  $Skills
     * @return \Illuminate\Http\Response
     */
    public function show(Skills $skills)
    {
        return view('back/admin/settings/skills/show', compact('skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skills  $Skills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = Skills::find($id);
        return view('back/admin/settings/skills/edit', compact('skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skills  $Skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $skills = Skills::find($request->skill_id);
        $skills->skill_name = $request->name;
        $skills->save();
        return redirect("/admin/settings/skills/list")->with('msg', 'Skill has been updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skills  $Skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skills $skills)
    {
        $skills->delete();
        return redirect()->route('skills.index');
    }
    public function moveToTrash($id)
    {
        $skills = Skills::find($id);
        $skills->isActive = "inactive";
        $skills->save();
        return redirect('/admin/settings/skills/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $skills = Skills::find($id);
        $skills->isActive = "active";
        $skills->save();
        return redirect('/admin/settings/skills/list')->with('msg', 'Skills restored successfully !');
    }
}
