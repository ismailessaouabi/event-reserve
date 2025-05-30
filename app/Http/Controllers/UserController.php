<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Socialmedia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Return a view with the users data
        return view('dashboard.admin.users', compact('users'));
    }


    public function mesinformation()
{
    $user = User::where('id', auth()->user()->id)->first();
    $socialmedia = Socialmedia::where('user_id', auth()->user()->id)->first();
            
    return view('dashboard.organizer.organizer', compact('user', 'socialmedia'));
}

    public function updateinfo(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'nom_entreprise' => $request->company,
            'country' => $request->country,
            'profile_picture' => $path ?? $user->profile_picture,

        ]);
        return redirect()->route('organizer.information', $user->id)->with('success', 'User updated successfully.');
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Return a view with the user data
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Return a view with the user data
        return view('dashboard.admin.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        // Update the user
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ])
        ;

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID and delete it
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
