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

    public function lister_event_by_category($category_id){
        try {
            $events = Event::where('category_id', $category_id)->with('teckets')->get();
            $categories = Category::all();
            return view('pages.eventsparcategory', compact('events', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error fetching events by category: ' . $e->getMessage());
            return redirect()->back()->with('error', "Une erreur est survenue lors de la récupération des événements par catégorie.");
        }
    }

    public function search_events(Request $request){
        try {
            $searchTerm = $request->name_event;
            $events_rechercher = Event::where('name', 'LIKE', '%' . $searchTerm . '%')->with('teckets')->get();
            $categories = Category::all();
            return view('pages.events_rechercher', compact('events_rechercher', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error searching events: ' . $e->getMessage());
            return redirect()->back()->with('error', "Une erreur est survenue lors de la recherche des événements.");
        }
    }

    public function filter_events(Request $request){
        try {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $events = Event::whereBetween('start_time', [$startDate, $endDate])->with('teckets')->get();
            $categories = Category::all();
            return view('pages.home', compact('events', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error filtering events: ' . $e->getMessage());
            return redirect()->back()->with('error', "Une erreur est survenue lors du filtrage des événements.");
        }
    }

    


}
