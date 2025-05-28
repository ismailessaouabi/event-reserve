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
        $categories = Category::all();
        $events = Event::all();
        return view('dashboard.organizer.events.mesevents', compact( 'categories', 'events'));
        
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
            'ville' => $request->city
        ]);
        $event = Event::create([
            'name' => $request->title,
            'image_path' => $path,
            'start_time' => $request->start_date,
            'end_time' => $request->end_date,
            'place_id' => $place->id,
            'category_id' => $request->category_id,
            'organizer_id' => auth()->user()->id
        ]);
        $tecket = Tecket::create([
            'event_id' => $event->id ,
            'prix'=> $request->ticket_price
            
        ]);
        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }
    public function show_event_organizer($id){
        $event = Event::findOrFail($id);
        return view('dashboard.organizer.events.showevent', compact('event'));
    }
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
        $eventsCount = Event::all()->count();//->whire('organizer_id', auth()->user()->id);
        $participantsCount = User::all()->count();//->whire(auth()->user()->id,'organizer_id' );
        return view('dashboard.organizer.layouts', compact('eventsCount', 'participantsCount'));
    }





    public function list_events_admin(){
        $categories = Category::all();
        $events = Event::all();
        return view('dashboard.admin.events', compact( 'categories', 'events'));
    }
    public function store_event_admin(Request $request){
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
    
    


    public function list_8events_accueil(Request $request){
        $events = Event::with('place','teckets')->limit(8)->get();
        $events_aujourd_hui = Event::whereDate('start_time', Carbon::now())->get();
        $categories = Category::all(); 

        return view('pages.accuiell', compact('events', 'categories', 'events_aujourd_hui'));
    }
    public function events_rechercher_accueil(Request $request){
        $name_event = $request->name_event;
        $events_rechercher = Event::where('name', 'like', '%' . $name_event . '%')->get();
        $categories = Category::all();
        return view('pages.events_rechercher', compact('events_rechercher', 'categories'));
    }
    public function show_event_accueil(string $id){
        $event = Event::findOrFail($id);
        return view('pages.showEvent', compact('event'));
    }
    public  function list_events_accueil(){
        $categories = Category::all();
        $events = Event::all();
        return view('pages.toutesevents', compact( 'categories', 'events'));
    }
     
    
    
   
}
