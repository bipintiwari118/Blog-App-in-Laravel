<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


public function register(){
    return view('front.register');
}

public function storeUser(Request $request){
    $validator = Validator::make($request->all(),[
        'name'=>'required',
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if($validator->passes()){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('login')->with('error','You are already register please login.');
        }else{
            $newUser =User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),

            ]);

            return redirect()->route('login')->with('success','successfully register please login.');
        }
        }
        return redirect()->route('user.register')
        ->withErrors($validator)
        ->withInput();

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
                }elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password,'is_admin' => '0'])){
                    return redirect()->route('home');
                }
        }else{
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput()
            ->with('error',"You are not eligible to login.");
        }

    }


    public function dashboard(){
        return view('auth.dashboard');
     }

     public function frontLogout(){
        Auth::logout();
        return redirect()->back();
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Successfully logout.');
    }
}
