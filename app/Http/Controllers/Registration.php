<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Setting;

class Registration extends Controller
{
    //
    public function create(){
        $stop_register=Setting::where('name','stop_register')->value('value');
    	return view('register',compact('stop_register'));
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required|email|unique:users',
    		'password'=>'required|min:6',
    		'rpassword'=>'required_with:password|same:password|min:6'

    	]);
    	$user =new User;
    	$user->name=$request->name;
    	$user->email=$request->email;
    	$user->password=Hash::make($request->password);
    	$user->save();
        $user->roles()->attach(Role::where('name','user')->first());
    	auth()->login($user);
    	return redirect('posts');




    }
}
