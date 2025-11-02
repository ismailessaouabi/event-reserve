<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class GetEventController extends Controller
{
    
    public function list_events(){
        try {
            $events = Event::with('teckets')->get();
            $categories = Category::all();
            return view('pages.home', compact('events', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des événements.');
        }
    }

    public function lister_event_details($id){
        try {
            $event = Event::findOrFail($id);
            return view('pages.showEvent', compact('event'));
        } catch (\Exception $e) {
            Log::error('Error fetching event details: ' . $e->getMessage());
            return redirect()->back()->with('error', "Une erreur est survenue lors de la récupération des détails de l'événement.");
        }
    }
}
