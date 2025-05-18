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
        if($request->role != 'admin')
        {
            $user = User::create([
                'name' => $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'telephone' => $request->telephone,
                'ville' => $request->ville,
                'payes' => $request->payes,
            ]);
        }
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

        $user = User::where('email', $email)->first();
        if(Auth::attempt($values))
        {
            if ($user->role == 'admin') {
                $request->session()->regenerateToken();
                $response = view('dashboard.organizer.layouts' , compact('user'));
                
            } else {
                $request->session()->regenerateToken();
                $response =  redirect()->route('organizer', ['id' => $user->id])->with('success', 'Login successful');
            }
            
        }
        else
        {
            $response = redirect()->route('login')->with('error', 'Login failed');
        }
        
        return $response;
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
