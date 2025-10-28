<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Log;



class AuthController extends Controller
{

    public function showformregister(){
        
        return view('pages.register');
    }
    public function showformlogin(){
        return view('pages.login');
    }
    public function register(RegisterRequest $request){   
      
        // Validate the request data
        $validatedData = $request->validated();

        try {
            
            // Create the user    
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'organizer',
                'phone' => $validatedData['phone'],
                'city' => $validatedData['city'],
            ]);
         
            return redirect()->route('login.form')->with('success', 'success');

       } catch (\Throwable $th) {

            return redirect()->route('register.form')->with('error', 'Something went wrong, please try again.');
       }
    }
    public function login(LoginRequest $request){

        $validatedData = $request->validated();
    
        try {
            // Récupérer l'utilisateur
            $user = User::where('email', $validatedData['email'])->first();
    
            // attempter to login
            if (! $user || ! Hash::check($validatedData['password'], $user->password)) {
                return back()->with('error', 'Identifiants incorrects');
            }
            
    
           

    
            return redirect()->intended(route('les_events_organizer'))
            ->with('success1', 'Login successful');    
        } catch (\Throwable $th) {

            Log::error('Erreur login: ' . $th->getMessage());
            return back()->with('error', 'Une erreur est survenue');
        }
    }
    public function logout(){

        Auth::logout();
        request()->session()->destroy();
        return redirect()->route('login')->with('success', 'Logout successful');
    }  
    
    
}
