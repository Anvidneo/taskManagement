<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    protected $users;
    public function __construct(){
        $this->users = new User();
    }

    public function login(){
        return view('auth.login');
    }  
      

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        if ($this->users->validateCredential($request)) {
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            return redirect()->route('projects.index')->with('success', 'Signed in');
        }
  
        return redirect()->route('login')->with('success', 'Login details are not valid');
    }

    public function registration(){
        return view('auth.registration');
    }

    public function customRegistration(Request $request){  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->users->createUser($data);

        if (!$check) {
            return redirect()->route('login')->with('success', 'User dont created');
        }
         
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        
        return redirect()->route('projects.index')->with('success', 'You have signed-in');
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}