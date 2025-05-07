<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }
    public function showAdminregisterForm()
    {
        return view('admin.auth.register');
    }
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('accueill')->with('error', 'You are not authorized to access this page.');
        }
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.users.index')->with('success', 'Login successful');
        }else{
            if (!Auth::check()) {
                return redirect('/');
            }
        }
        
    }

}
