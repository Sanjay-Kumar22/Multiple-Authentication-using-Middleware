<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function viewRegister(){
        return view('register');
    }

    public function register (Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
             'email' =>"required|unique:users,email",
             'password' => 'required|min:6',
             'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $user = User::create([
          'name' =>$request->name,
          'email' => $request->email,
          'password'=>$request->password,
          'role' => 'user',
        ]);

        
       return redirect()->route('login')->with('success', 'user register succesful!');
    }

    public function viewLogin(){
        return view('login');
    }

    public function login(Request $request){
       $validator = Validator::make($request->all(),[
            
             'email' =>"required|email",
             'password' => 'required|min:6',
             
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $credentials = $request->only('email', 'password');

       if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('account.dashboard');
       }

       return redirect()->back()->with('error','Invalid email or password');
    } 

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        Auth::logout();
       return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
