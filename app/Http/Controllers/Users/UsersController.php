<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\CheckMat;
use App\Profile;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');        
    }

    public function profile(){
        
        return view('users.profile', [
            'user'=>Auth::user(),
        ]);
    }    

    public function edit(){
        return view('users.edit', [
            'user'=>Auth::user(),
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'first_name'=>'required|max:100',
            'middle_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'dob'=>'required|date',
            'profile_pic'=>'image|max:2048',
            'address'=>'required',
            'phone'=>'required|numeric|digits:11',
            'mat_no'=>[
                Rule::requiredIf(auth()->user()->role->name=='student'),
                'starts_with:PSC',
            ],
            'employment_no'=>[
                Rule::requiredIf(auth()->user()->role->name=='staff'),
				'numeric',
				'digits:10',
            ],
            'level'=>[
                Rule::requiredIf(auth()->user()->role->name=='student'),
                'numeric',
                'digits:3',
                'min:100',
                'max:900',
                new CheckMat,
            ]
        ]);
        $user = auth()->user();
        if($request->has('profile_pic')){
            $profile_pic = basename($request->file('profile_pic')->store('public/profile_pics'));
            $user->profile()->updateOrCreate(
                [],
                [
                'first_name'=>$request->input('first_name'),
                'middle_name'=>$request->input('middle_name'),
                'last_name'=>$request->input('last_name'),
                'mat_no'=>$request->input('mat_no'),
                'dob'=>$request->input('dob'),
                'phone'=>$request->input('phone'),
                'address'=>$request->input('address'),
                'employment_no'=>$request->input('employment_no'),
                'level'=>$request->input('level'),
                'profile_pic'=>$profile_pic,                
                //'touched'=>1,
            ]);
            return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
        }
        $user->profile()->updateOrCreate(
            [],
            [
            'first_name'=>$request->input('first_name'),
            'middle_name'=>$request->input('middle_name'),
            'last_name'=>$request->input('last_name'),
            'mat_no'=>$request->input('mat_no'),
            'dob'=>$request->input('dob'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
            'employment_no'=>$request->input('employment_no'),
            'level'=>$request->input('level'),
            //'touched'=>1,
        ]);
        return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
        
    }

    public function change_password(){
        return view('users.change-password', [

        ]);
    }

    public function update_password(Request $request){
        $request->validate([
            'password'=>'required|confirmed',
        ]);
        $user = auth()->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('profile')->with('success', 'Password Changed Successfully');
    }
}
