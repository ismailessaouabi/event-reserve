<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;



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
         
            return redirect()->route('register.form')->with('success', 'success');

       } catch (\Throwable $th) {

            return redirect()->route('register.form')->with('error', 'Something went wrong, please try again.');
       }
    }
    public function login(LoginRequest $request){

        $validatedData = $request->validated();
    
        try {
            // Récupérer l'utilisateur
            $user = User::where('email', $validatedData['email'])->first();
    
            // Vérifier existence + rôle + mot de passe
            if (!$user || $user->role !== 'organizer' || !Hash::check($validatedData['password'], $user->password)) {
                return redirect()->route('login.form')->with('error', 'Identifiants incorrects');
            }
    
            // Authentifier l'utilisateur
            Auth::login($user);
            $request->session()->regenerate();
    
            return redirect()->intended('dashboard');
    
        } catch (\Throwable $th) {
            
            Log::error('Erreur login: ' . $th->getMessage());
            return redirect()->route('login.form')->with('error', 'Une erreur est survenue');
        }
    }
    public function logout(){

        Auth::logout();
        request()->session()->destroy();
        return redirect()->route('login')->with('success', 'Logout successful');
    }  
    
    
}
