<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members = User::role('member')->latest()->paginate(10);
        return view('members.index',compact('members'));
    }

    public function show(User $user){
//        dd($user);
        return view('members.show',compact('user'));
    }

    public function revoke(User $user){
        $user->delete();
        return redirect()->back()->with('warning','Membership Revoke!');
    }

    public function activate(User $user){
    $user->update(['status'=>'active']);
        return redirect()->back()->with('success','Membership Activated!');
    }

    public function suspend(User $user){
        $user->update(['status'=>'suspend']);
        return redirect()->back()->with('success','Membership Suspended!');
    }
}
