<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function create(){
    	return view('login');
    }
    public function store(){
       $this->validate(request(),[
       	'email'=>'required|email',
    	'password'=>'required|min:6'
       ]);
       auth()->attempt(request(['email','password']));
       if(!auth()->attempt(request(['email','password']))){
       	  return back()->withErrors([
       	  	'message'=>'email or password not correct'
       	  ]);
       }
       return redirect('posts');
    }
    public function destroy(){
    	auth()->logout();
    	return redirect('posts');
    }
}
