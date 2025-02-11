<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


     public function dashboard(){
        return view('auth.dashboard');
     }




    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'is_admin' => '1'])) {
                    return redirect()->route('show.dashboard')->with('success','You are in dashboard');
                }
        }
        return redirect()->route('login')
        ->withErrors($validator)
        ->withInput()
        ->with('error',"You are not eligible to login.");
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Successfully logout.');
    }
}
