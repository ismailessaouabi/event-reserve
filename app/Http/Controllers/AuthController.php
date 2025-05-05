<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            'password' => Hash::make($request->password),
            'phone' => $request->telephone,
            'city' => $request->ville,
            'country' => $request->payes,
            'address' => $request->adress,
        ]);
        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful');
       


    }
    
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $values = [
            'email' => $email,
            'password' =>  $password,
        ];
        if (Auth::attempt($values)) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login successful');
        } else {
            return redirect()->back()->with('error', 'email or password incorrect');
        }

        
        

        

        
        

        
    }

    public function logout()
    {
        Auth::logout();
        // Invalidate the session
        request()->session()->invalidate();
        // Regenerate the CSRF token
        request()->session()->regenerateToken();
        // Redirect to the login page with a success message
    
        return redirect()->route('login')->with('success', 'Logout successful');
    }  
    
}
