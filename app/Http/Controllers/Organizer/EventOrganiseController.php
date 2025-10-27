<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use App\models\Tecket;



class EventController extends Controller
{
    

    public function list_events_organizer(){
        $events = Event::With('place','teckets')->where('organizer_id', auth()->user()->id)->get();
        return view('dashboard.organizer.events.mesevents', compact('events'));
        
    }
    
    public function create_event_organizer(){
        $categories = Category::all();
        return view('dashboard.organizer.events.ajoutevent', compact('categories'));
    }
    
    public function store_event_organizer(Request $request){
        $path = $request->file('image')->store('images', 'public');
        $place = Place::create([
            'name' => $request->location,
            'capacity' => $request->capacity,
            'city' => $request->city
        ]);
        
        $event = Event::create([
            'name' => $request->title,
            'image_path' => $path,
            'start_time' => $request->start_date,
            'end_time' => $request->end_date,
            'category_id' => $request->category_id,
            'organizer_id' => auth()->user()->id,
            'location_id' => $place->id,
        ]);
        $tecket = Tecket::create([
            'price'=> $request->ticket_price,
            'event_id' => $event->id ,
            'user_id' => auth()->user()->id,

            
        ]);
        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }
    /*
    public function show_event_organizer($id){
        $event = Event::findOrFail($id);
        return view('dashboard.organizer.events.showevent', compact('event'));
    }*/
    public function edit_event_organizer($id){
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.organizer.events.editevent', compact('event', 'categories'));
    }
    public function update_event_organizer(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully.');
    }
    
    public function destroy_event_organizer($id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully.');
    }
    
    public function countevents_organizer(){
        $eventsCount = Event::all()->where('organizer_id', auth()->user()->id)->count();
        $participantsCount = User::all()->count();//->whire(auth()->user()->id,'organizer_id' );
        return view('dashboard.organizer.layouts', compact('eventsCount', 'participantsCount'));
    }





    
    
    


   
     
    
    
   
}
