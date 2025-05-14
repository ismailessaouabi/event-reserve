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
            'ville' => $request->ville
        ]);

        $path = $request->file('image')->store('images', 'public');
    

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
        $categories = Category::all();
        return view('dashboard.admin.editevent', compact('event', 'categories'));
    }

    
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        
        // Pour le modèle Place, il faut d'abord trouver l'instance ou en créer une nouvelle
        // Si place_id existe dans event, mettre à jour cette place
        if ($event->place_id) {
            $place = Place::findOrFail($event->place_id);
            $place->update([
                'name' => $request->lieu,
            ]);
        } else {
            // Sinon, créer une nouvelle place
            $place = Place::create([
                'name' => $request->lieu,
            ]);
            // Associer la place à l'événement
            $event->place_id = $place->id;
        }
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }
        
        $event->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'image_path' => $path ?? $event->image_path,
        ]);
        
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

   
    public function destroy(string $id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
