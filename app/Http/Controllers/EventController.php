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
        $events = Event::with(['category','place'])->get();
        $categories = Category::all();
        return view('admin.events.index', compact('events', 'categories'));   
    }
    

    public function home(){
        $events = Event::with('place')->get();
        $categories = Category::all();
        return view('pages.accuiell', compact('events', 'categories'));
    }

    public function store(Request $request){
        return view('admin.events.create');
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
