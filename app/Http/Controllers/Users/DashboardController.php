<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('dashboard-check');
    }

    public function index(){
        return view('dashboard.index', [
            'users'=>Role::find(2)->users()->paginate(40),
        ]);
    }
    
    public function staffs(){
        return view('dashboard.index');
    }

    public function blockedUsers(){
        return view('dashboard.index');
    }

    public function students(){
        return view('dashboard.index', [
            'users'=>Role::find(1)->users()->paginate(40),
        ]);
    }

    public function blockUser(Request $request){
        $user = User::findOrFail($request->id);
        $user->status = false;
        $user->save();
        return redirect()->back()->with('message', 'User Blocked Successfully');
    }


    public function unblockUser(Request $request){
        $user = User::findOrFail($request->id);
        $user->status = true;
        $user->save();
        return redirect()->back()->with('message', 'User Blocked Successfully');
    }

    public function deleteUser(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully'); 
    }

}
