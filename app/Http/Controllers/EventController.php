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
        $events = Event::all();
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
        $events = Event::all();
        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view with the events data
        return view('pages.accuiell', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        // Fetch all categories from the database
        $categories = Category::all();
        // Pass the categories to the view
        
        return view('admin.events.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename; // Store the path to the image
        } elseif ($request->input('image_path') !== null) {
            $imagePath = $request->input('image_path'); // Use the existing image path
        } else {
            $imagePath = 'aucune'; // Set to null if no file is uploaded
        }


        


        // Create a new event
        $event = Event::create([
            'name' => $request->input('name'),
            'image_path' => $imagePath,
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);
        // Check if the event was created successfully
        if (!$event) {
            return redirect()->back()->with('error', 'Failed to create event.');
        }

        // Redirect to the events index with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
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
