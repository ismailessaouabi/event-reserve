<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Place;



class EventController extends Controller
{
    
    public function index(){
        $categories = Category::all();
        $events = Event::all();
        return view('dashboard.admin.events', compact( 'categories', 'events'));
    }
    

    public function home(){
        $events = Event::with('place')->get();
        $categories = Category::all();
        return view('pages.accuiell', compact('events', 'categories'));
    }

    public function store(Request $request){
        $place = Place::create([
            'name' => $request->lieu,
            'capacity' => $request->capacity,
        ]);

        $path = $request->file('image')->store('public/images');
    

        $event = Event::create([
            'name' => $request->name,
            'image_path' => $path,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'place_id' => $place->id,
            'category_id' => $request->category
        ]);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(string $id){
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    public function edit(string $id){
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    
    public function update(Request $request, string $id){
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

   
    public function destroy(string $id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
