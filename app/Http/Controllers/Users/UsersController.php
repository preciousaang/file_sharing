<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
            'mat_no'=>[
                Rule::requiredIf(auth()->user()->role->name=='student'),
                'starts_with:PSC'
            ],
            'employment_no'=>[
                Rule::requiredIf(auth()->user()->role->name=='staff'),
            ],
            'level'=>[
                Rule::requiredIf(auth()->user()->role->name=='student'),
                'numeric',
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
                'employment_no'=>$request->input('employment_no'),
                'level'=>$request->input('level'),
                'profile_pic'=>$profile_pic,                
                'touched'=>1,
            ]);
            return redirect()->route('edit-profile')->with('success', 'Profile Updated Successfully');
        }
        $user->profile()->updateOrCreate(
            [],
            [
            'first_name'=>$request->input('first_name'),
            'middle_name'=>$request->input('middle_name'),
            'last_name'=>$request->input('last_name'),
            'mat_no'=>$request->input('mat_no'),
            'dob'=>$request->input('dob'),            
            'employment_no'=>$request->input('employment_no'),
            'level'=>$request->input('level'),
            'touched'=>1,
        ]);
        return redirect()->route('profile')->with('success', 'Profile Updated Successfully');
        
    }
}
