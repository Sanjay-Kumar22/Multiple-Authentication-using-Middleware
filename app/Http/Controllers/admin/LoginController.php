<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function viewAdminLogin(){
        return view('admin/login');
    }

    public function adminLogin(Request $request) {
        $validator = Validator::make($request->all(),[
           'email' => 'required|email',
           'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email','password'); 


        if(Auth::guard('admin')->attempt($credentials)) {

            if(Auth::guard('admin')->user()->role !="admin") {
                Auth::guard('admin')->logout();
                return redirect()->back()->with('error','you are not authorized to access this page');
            }

             return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error','invalid email or password');
    

    }
}
