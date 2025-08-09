<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showformregister()
    {
        $categories = Category::all();
        return view('pages.register', compact('categories'));
    }
    public function showformlogin()
    {
        $categories = Category::all();
        return view('pages.login' , compact('categories'));
    }
    public function register(Request $request)
    {   
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'telephone' => 'required',
            'ville' => 'required',
            'payes' => 'required',
        ]);

        // Create the user    
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'organizer',
            'telephone' => $request->telephone,
            'ville' => $request->ville,
            'payes' => $request->payes,
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

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }
        // Check if the user is an organizer
        if ($user->role != 'organizer') {
            return redirect()->route('login')->with('error', 'Unauthorized user role');
        }
        // check if the password is correct
        if (!Hash::check($password, $user->password)) {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
        
        if(Auth::attempt($values))
        {
            if ($user->role == 'organizer') {
                $request->session()->regenerateToken();
                return redirect()->route('organizer.events.index', ['id' => $user->id])->with('success', 'Login successful');
                
            } 
            
        }
        else
        {
            return redirect()->route('login')->with('error', 'Login failed');
        }
        
    }


    public function showformlogin_admin()
    {
        return view('dashboard.admin.login-admin');
    }

    public function login_admin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $values = [
            'email' => $email,
            'password' =>  $password,
        ];
        if(Auth::attempt($values))
        {
            if (Auth::user()->role == 'admin') {
                $request->session()->regenerateToken();
                return redirect()->route('admin.events.index')->with('success', 'Login successful');
            }
        }
        else
        {
            return redirect()->route('login.admin')->with('error', 'Login failed');
        }
    }

   


    

    public function logout()
    {
        Auth::logout();
        // Invalidate the session
        request()->session()->destroy();
        // Regenerate the CSRF token
        request()->session()->regenerateToken();
        // Redirect to the login page with a success message
    
        return redirect()->route('login')->with('success', 'Logout successful');
    }  
    
    
}
