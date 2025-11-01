<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Organiser\StoreEventRequest;
use App\Http\Requests\Organiser\UpdateEventRequest;
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
        $events = Event::With('place','teckets')->orderBy('created_at', 'desc')
                    ->where('organizer_id', auth()->user()->id)
                    ->get();
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
                    'name' => $validatedData['location'],
                    'capacity' => $validatedData['capacity'],
                    'city' => $validatedData['city'],
                ]);
                // Create Event
                $event = Event::create([
                    'name' => $validatedData['title'],
                    'image_path' => $validatedData['image']->store('events', 'public'),
                    'start_time' => Carbon::parse($validatedData['start_date']),
                    'end_time' => Carbon::parse($validatedData['end_date']),
                    'category_id' => $validatedData['category_id'],
                    'organizer_id' => auth()->user()->id,
                    'location_id' => $place->id,
                ]);
                // Create Ticket
                Tecket::create([
                    'event_id' => $event->id,
                    'price' => $validatedData['ticket_price'],  
                    'user_id' => auth()->user()->id,                
                ]);
            DB::commit();

            // Return success response
            return redirect()->route('les_events_organizer')->with('success', 'Event created successfully.');

        } catch (\Throwable $th) {
            Log::error('Error creating event: ' . $th->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
        
     
      
    }

    public function show_event($id){
        try {
            $event = Event::with('place','teckets','category')->findOrFail($id);          
            return view('dashboard.organizer.events.showevent', compact('event'));
        } catch (\Throwable $th) {
            Log::error('Error showing event: ' . $th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit_event($id){
        try {
            $event = Event::with('place','teckets',)->findOrFail($id); 
            $categories = Category::all();         
            return view('dashboard.organizer.events.editevent', compact('event', 'categories'));
        } catch (\Throwable $th) {
            Log::error('Error editing event: ' . $th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function update_event(UpdateEventRequest $request, $id){
        $validatedData = $request->validated();

        try {

            DB::beginTransaction();
                $event = Event::findOrFail($id);
                $place = Place::findOrFail($event->location_id);

                // Update Place
                $place->update([
                    'name' => $validatedData['location'],
                    'capacity' => $validatedData['capacity'],
                    'city' => $validatedData['city'],
                ]);
                // Update Event
                $event->update([
                    'name' => $validatedData['title'],
                    'image_path' => $validatedData['image']->store('events', 'public'),
                    'start_time' => Carbon::parse($validatedData['start_date']),
                    'end_time' => Carbon::parse($validatedData['end_date']),
                    'category_id' => $validatedData['category_id'],
                ]);
                // Update Ticket
                $tecket = Tecket::where('event_id', $event->id)->first();
                $tecket->update([
                    'price' => $validatedData['ticket_price'],  
                ]);
            DB::commit();

            // Return success response
            return redirect()->route('les_events_organizer')->with('success', 'Event updated successfully.');

        } catch (\Throwable $th) {
            Log::error('Error updating event: ' . $th->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }

    }

    public function destroy_event($id){
        try {
            
            $event = Event::findOrFail($id);
            $event->delete();
            return redirect()->route('les_events_organizer')->with('success', 'Event deleted successfully.');

        } catch (\Throwable $th) {

            Log::error('Error deleting event: ' . $th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    

}
