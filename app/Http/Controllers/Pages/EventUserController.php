<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function list_8events_accueil(Request $request){
        $events = Event::with('place','teckets')->limit(8)->get();
        $events_aujourd_hui = Event::whereDate('created_at', Carbon::now())->get();
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
        $events = Event::with('place','teckets')->get();
        return view('pages.toutesevents', compact( 'categories', 'events'));
    }
    public function filtrer_events_accueil(Request $request)
    {
        // Récupérer toutes les catégories pour le filtre
        $categories = Category::all();
        $allevents = Event::all();
        // Commencer la requête avec les relations
        $query = Event::with(['place', 'teckets', 'category']);
        // Appliquer les filtres seulement s'ils sont présents dans la requête
        if ($request->has('categorie') && $request->categorie) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('id', $request->categorie);
            });
        }
        if ($request->has('ville') && $request->ville) {
            $query->whereHas('place', function($q) use ($request) {
                $q->where('name', $request->ville);
            });
        }
        if ($request->has('prix_max') && $request->prix_max) {
            $query->whereHas('teckets', function($q) use ($request) {
                $q->where('prix', '<=', $request->prix_max);
            });
        }
        // Exécuter la requête et paginer les résultats
        $events = $query->get();
        return view('pages.eventsfiltrer', compact('categories', 'allevents', 'events' ));
    }
}
