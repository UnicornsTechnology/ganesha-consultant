<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::where('isActive', 'active')->latest()->paginate(10);
        $locations_trashed = Location::where('isActive', 'inActive')->latest()->paginate(10);
        return view('back/admin/settings/locations/index', compact('locations', 'locations_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/settings/locations/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location;
        $location->location_name = $request->name;
        $location->save();
        return redirect("/admin/settings/locations/list")->with('msg', 'Location has been created successfully !');
    }
    public function ajaxStore(Request $request)
    {
        $location = new Location();
        $location->location_name = $request->key;
        $existingSkill = Location::where('location_name', $request->key)->first();
        if ($existingSkill) {
            return response()->json([
                'error' => 'Location name already exists',
                'done' => false,
                "data" =>  Location::where('isActive', 'active')->latest()->get(),

            ], 409,);
        }
        $location->save();
        return response()->json(
            [
                'message' => 'Location added successfully',
                'done' => true,
                "data" =>  Location::where('isActive', 'active')->latest()->get(),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $Location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('back/admin/settings/locations/show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $Location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);
        return view('back/admin/settings/locations/edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $Location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $location = Location::find($request->location_id);
        $location->location_name = $request->name;
        $location->save();
        return redirect("/admin/settings/locations/list")->with('msg', 'Location has been updated successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $Location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('back/admin/settings/locations/index');
    }
    public function moveToTrash($id)
    {
        $location  = Location::find($id);
        $location->isActive = "inactive";
        $location->save();
        return redirect('/admin/settings/locations/list')->with('msg', 'Moved to trashed successfully !');
    }
    public function restoreFromTrash($id)
    {
        $location  = Location::find($id);
        $location->isActive = "active";
        $location->save();
        return redirect('/admin/settings/locations/list')->with('msg', 'Location restored successfully !');
    }
}
