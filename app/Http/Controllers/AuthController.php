<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.showloging');
    }



    public function loging(Request $request){
              $credential=$request->only('email','password');
              if(Auth::attempt($credential)){
                return redirect()->intended('/');
              }
             return back()->withErrors(['message'=>'Invalid Credantials']); 
    }


    public function showregister(){
        return view('auth.register');
    }
    
    public function register(Request $request){
        $request->validate([
             'name'=>'required|string|max:100',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:6|confirmed',
        ]);
         $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
         return redirect('/');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
