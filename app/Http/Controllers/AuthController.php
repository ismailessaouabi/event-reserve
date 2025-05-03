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
        // Validate the request
        $request->validate([
            'role' => 'required|in:organizateur,utilisateur',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'telephone' => 'required|string|max:15',
            'ville' => 'required|string|max:255',
            'payes' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'payes' => 'required|string|max:255',
            

        ]);

        // Create the user
        User::create([
            'role' => $request->role,
            'name' => $request->nom,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->telephone,
            'city' => $request->ville,
            'contry' => $request->payes,
            'adress' => $request->adress,
        ]);

        redirect()->route('login')->with('success', 'Registration successful. Please log in.');
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
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
