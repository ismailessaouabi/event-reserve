<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    
    public function index_places_admin()
    {
        // This method should return a view with a list of places
        $places = Place::all();
        return view('dashboard.admin.places', compact('places'));
    }

    
    public function store_place_admin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'lieu' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'capacity' => 'required|integer',
            
        ]);
       
        // Check if the place already exists
        $place = Place::where('name', $request->lieu)->first();
        if ($place) {
            return redirect()->route('admin.places.index')->with('error', 'Le lieu existe deja');
        }

        // Create a new place
        Place::create([
            'name' => $request->lieu,
            'ville' => $request->ville,
            'capacity' => $request->capacity,
        ]);

        // Redirect to the index page
        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     */
    public function show_place_admin(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_place_admin(string $id)
    {
        // Find the place by ID
        $place = Place::findOrFail($id);

        // Return the edit view with the place data
        return view('dashboard.admin.editplace', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_place_admin(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'lieu' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'capacity' => 'required|integer',
        ]);

        // Find the place by ID
        $place = Place::findOrFail($id);

        // Update the place
        $place->update([
            'name' => $request->lieu,
            'ville' => $request->ville,
            'capacity' => $request->capacity,
        ]);

        // Redirect to the index page
        return redirect()->route('admin.places.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_place_admin(string $id)
    {
        // Find the place by ID and delete it
        $place = Place::findOrFail($id);
        $place->delete();

        // Redirect to the index page
        return redirect()->route('admin.places.index');
    }
}
