<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    public function list_events_admin(){
        $categories = Category::all();
        $events = Event::with('organizer')->get();
        return view('dashboard.admin.events', compact( 'categories', 'events'));
    }
    public function store_event_admin(Request $request){
        $place = Place::create([
            'name' => $request->lieu,
            'capacity' => $request->capacity,
            'city' => $request->ville
        ]);

        $path = $request->file('image')->store('images', 'public');
    

        $event = Event::create($request->all() + [
            'image_path' => $path,
            'place_id' => $place->id,
            'organizer_id' => auth()->user()->id, // Associer l'organisateur actuel
        ]);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }  
    public function edit_event_admin(string $id){
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.admin.editevent', compact('event', 'categories'));
    }
    public function update_event_admin(Request $request, string $id){
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
    public function destroy_event_admin(string $id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
