<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class AdminExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::where('isActive', 'active')->latest()->paginate(10);
        $experience_trashed = Experience::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/experience/index', compact('experience', 'experience_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/experience/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experience = new Experience();
        $experience->experiences_name = $request->name;
        $experience->save();
        return redirect('/admin/settings/experience/list')->with('msg', 'Experience created successfully !');
    }

    public function ajaxStore(Request $request)
    {
        $experience = new Experience();
        $experience->experiences_name = $request->key;
        $existingexperience = Experience::where('experiences_name', $request->key)->first();
        if ($existingexperience) {
            return response()->json([
                'error' => 'Experience already exists',
                'done' => false,
                "data" =>  Experience::where('isActive', 'active')->latest()->get(),

            ], 409,);
        }
        $experience->save();
        return response()->json(
            [
                'message' => 'Experiences added successfully',
                'done' => true,
                "data" =>  Experience::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('back/admin/settings/experience/show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::find($id);
        return view('back/admin/settings/experience/edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $experience = Experience::find($request->exp_id);
        $experience->experiences_name = $request->name;
        $experience->save();
        return redirect('/admin/settings/experience/list')->with('msg', 'Experience updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experience.index');
    }

    public function moveToTrash($id)
    {
        $experience = Experience::find($id);
        $experience->isActive = "inactive";
        $experience->save();
        return redirect('/admin/settings/experience/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $experience = Experience::find($id);
        $experience->isActive = "active";
        $experience->save();
        return redirect('/admin/settings/experience/list')->with('msg', 'Experience restored successfully !');
    }
}
