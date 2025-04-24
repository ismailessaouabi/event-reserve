<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function showLoginForm(){
        return view('login');
    }
    public function login(Request $request){
    
        return redirect('dashboard');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function showRegisterForm(){
        return view('register');
    }
    public function register(){
        return redirect('login');
    }

}
