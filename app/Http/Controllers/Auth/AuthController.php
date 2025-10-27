<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{

    public function showformregister(){
        
        return view('pages.register');
    }
    public function showformlogin(){
        return view('pages.login');
    }

    public function register(RegistredRequest $request){   
      
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
         
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', '...');

       } catch (\Throwable $th) {

            return redirect()->route('register')->with('error', 'Something went wrong, please try again.');
       }
    }
    public function login(Request $request){

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
    public function logout(){

        Auth::logout();
        request()->session()->destroy();
        return redirect()->route('login')->with('success', 'Logout successful');
    }  
    
    
}
