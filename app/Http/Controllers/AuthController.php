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
        
        return view('pages.register');
    }
    public function showformlogin()
    {
        return view('pages.login');
    }
    public function register(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required',
            'city' => 'required',
        ]);

        // Create the user    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'organizer',
            'phone' => $request->phone,
            'city' => $request->city,
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
            return redirect()->route('login')->with('error', 'your email is not registered');
        }
         //Check if the user is an organizer
        if ($user->role != 'organizer') {
            return redirect()->route('login')->with('error', 'Unauthorized access');
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
