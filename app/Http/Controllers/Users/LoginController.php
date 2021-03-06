<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout']);
    }

    public function form(){
        return view('users.login');
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password'); 
        $username = $request->input('username');
        $password = $request->input('password');
        if(Auth::attempt(['username'=>$username, 'password'=>$password, 'status'=>1],$request->input('remember'))){
            if($request->has('prev')){
                return redirect($request->get('prev'));
            }
            return redirect()->intended(route('homepage'));
        }else{
            return redirect()->back()->withInput()->with('error', 'Username/Password Combo Wrong!');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login-form');
    }

}