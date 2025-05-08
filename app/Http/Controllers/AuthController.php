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
        return view('pages.register');
    }
    public function showformlogin()
    {
        return view('pages.login');
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
    
    public function loginCustomer(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $values = [
            'email' => $email,
            'password' =>  $password,
        ];

        if(Auth::attempt($values))
        {
            // Check if the user is an admin
            if(Auth::user()->role == 'customer')

            {
                $request->session()->regenerate();
                // Redirect to the admin dashboard
                return redirect()->route('')->with('success', 'Login successful');
            }
            else
            {
                return redirect()->route('login')->with('error', 'Login failed');
            }
           
        }
        else
            {
                return redirect()->route('login')->with('error', 'Login failed');
            }
    }

    public function loginAdmin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $values = [
            'email' => $email,
            'password' =>  $password,
        ];

        if(Auth::attempt($values))
        {
            // Check if the user is an admin
            if(Auth::user()->role == 'admin')

            {
                $request->session()->regenerate();
                // Redirect to the admin dashboard
                return redirect()->route('admin')->with('success', 'Login successful');
            }
            else
            {
                return redirect()->route('login')->with('error', 'Login failed');
            }
           
        }
        else
        {
            return redirect()->route('login')->with('error', 'Login failed');
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
