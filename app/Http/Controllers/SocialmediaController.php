<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socialmedia;

class SocialmediaController extends Controller
{
    public function index()
    {
        // Fetch all social media links for the authenticated user
        $sociallinks = Socialmedia::where('user_id', auth()->user()->id)->first();

        // Return a view with the social media data
        return view('dashboard.organizer.organizer', compact('sociallinks'));
    }

  
    
    public function store(Request $request)
    {
        
       Socialmedia::updateOrCreate([
           'user_id' => auth()->user()->id,
           'facebook' => $request->facebook,
           'twitter' => $request->twitter,
           'instagram' => $request->instagram,
           'linkedin' => $request->linkedin,
           'website' => $request->website
           
       ]);
        

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Social media link added successfully.');
    }
}
