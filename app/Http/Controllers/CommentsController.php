<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
class CommentsController extends Controller
{
    //
    public function store(Request $request){
    	$comment=new Comment();
    	$comment->body=$request->input('comment');
    	$comment->post_id=$request->input('post_id');
    	$comment->user_id=Auth::user()->id;
    	$comment->save();
    	return back();
    }

}
