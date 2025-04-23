<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function showLoginForm(){
        return view('login');
    }
    public function dashboard(){
        return view('dashboard');
    }

}
