<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Organiser\StoreEventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use App\models\Tecket;




class EventOrganiserController extends Controller
{
    

    public function list_events(){
        $events = Event::With('place','teckets')->get();
        return view('dashboard.organizer.events.mesevents', compact('events'));
        
    }
    
    public function create_event(){
        $categories = Category::all();
        return view('dashboard.organizer.events.ajoutevent', compact('categories'));
    }
    
    public function store_event(StoreEventRequest $request){
        $validatedData = $request->validated();

        try {

            DB::beginTransaction();
                // Create Place
                $place = Place::create([
                    'location' => $validatedData['location'],
                    'capacity' => $validatedData['capacity'],
                    'city' => $validatedData['city'],
                ]);
                // Create Event
                $event = Event::create([
                    'title' => $validatedData['title'],
                    'image' => $validatedData['image']->store('events', 'public'),
                    'start_date' => Carbon::parse($validatedData['start_date']),
                    'end_date' => Carbon::parse($validatedData['end_date']),
                    'category_id' => $validatedData['category_id'],
                    'organizer_id' => auth()->user()->id,
                    'place_id' => $place->id,
                ]);
                // Create Ticket
                Tecket::create([
                    'event_id' => $event->id,
                    'ticket_price' => $validatedData['ticket_price'],
                ]);
            DB::commit();

            // Return success response
            return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');

        } catch (\Throwable $th) {
            Log::error('Error creating event: ' . $th->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
        
     
      
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
