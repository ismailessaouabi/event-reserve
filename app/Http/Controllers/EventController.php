<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all events from the database
        $events = Event::with(['category','place'])->get();

        // Fetch all categories from the database
        $categories = Category::all();
        
        // Return the view with the events and categories data
        return view('admin.events.index', compact('events', 'categories'));



        
    }
    /**
     * display events dans view home
     */
    public function home()
    {
        // Fetch all events from the database
        $events = Event::with('place')->get();

        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view with the events data
        return view('pages.accuiell', compact('events', 'categories'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

    // Début de la transaction
    DB::beginTransaction();

    try {
        // Créer ou récupérer le lieu
        $place = Place::firstOrCreate(
            [
                'name' => $request->input('location')
            ]
        );

        // Créer l'événement
        $event = Event::create([
            'name' => $request->input('title'),
            'start_date' => $request->input('date'),
            'place_id' => $place->id,
        ]);

        

        // Commit de la transaction
        DB::commit();

        // Redirection avec message de succès
        return redirect()
            ->route('events.show', $event->id)
            ->with('success', 'Événement créé avec succès');

    } catch (\Exception $e) {
        // Rollback en cas d'erreur
        DB::rollBack();

        // Redirection avec message d'erreur
        return redirect()
            ->back()
            ->with('error', 'Erreur lors de la création de l\'événement: ' . $e->getMessage())
            ->withInput();
    }

        


        


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);

        // Return the view with the event data
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);

        // Return the view to edit the event
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Find the event by ID and update it
        $event = Event::findOrFail($id);
        $event->update($request->all());

        // Redirect to the events index with a success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the event by ID and delete it
        $event = Event::findOrFail($id);
        $event->delete();

        // Redirect to the events index with a success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
