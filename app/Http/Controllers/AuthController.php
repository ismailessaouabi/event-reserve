<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function showformregister()
    {
        return view('auth.register');
    }
    public function showformlogin()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        

        // Create the user
        User::create([
            'role' => $request->role,
            'name' => $request->nom,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->telephone,
            'city' => $request->ville,
            'country' => $request->payes,
            'address' => $request->adress,
        ]);
       


    }
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('/')->with('success', 'Login successful');
        }

        
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
