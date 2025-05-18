<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    public function index()
    {
        // Fetch all social media links for the authenticated user
        $socialmedias = auth()->user()->socialmedias;

        // Return a view with the social media data
        return view('dashboard.organizer.socialmedia', compact('socialmedias'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        // Create a new social media link
        foreach ($request->name as $index => $name) {
            auth()->user()->socialmedias()->create([
                'name' => $name,
                'url' => $request->url[$index],
            ]);
        }
        

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Social media link added successfully.');
    }
}
