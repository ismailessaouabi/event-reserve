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

        $event = Event::create([
            'name' => $request->name,
            'start_time' => $request->date,
            'place_id' => $place->id,
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
