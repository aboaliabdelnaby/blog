<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\User;
use App\Role;
use App\Like;
use App\Comment;
use App\Setting;

class PagesController extends Controller
{
    //

    public function posts(){
    	  $posts=Post::all();
        $cats=Category::all();
    	  return view('content.posts',compact('posts','cats'));
    }
    public function post($id){
    	  $post=Post::find($id);
        $cats=Category::all();
        $stop_comment=Setting::where('name','stop_comment')->value('value');
    	  return view('content.post',compact('post','cats','stop_comment'));
    }
     public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'cat_id'=>'required',
            'image'=>'image|mimes:jpg,gif,png,jpeg|max:204'
        ]);

        $img_name='';
        if($request->hasFile('image')){
            $img_name='post'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images/',$img_name);
        }
    	$post=new Post;
    	$post->title=$request->input('title');
    	$post->body=$request->input('body');
        $post->category_id=$request->input('cat_id');
        $post->image=$img_name;
    	$post->save();

    	return redirect('posts');
    }
    public function category($id){
        $category=Category::find($id);
        $cats=Category::all();
        return view('content.category',compact('category','cats'));
    }

    public function admin(){
        $users=User::all();
        $stop_comment=Setting::where('name','stop_comment')->value('value');
        $stop_register=Setting::where('name','stop_register')->value('value');
        return view('content.admin',compact('users','stop_comment','stop_register'));
    }
    public function addRole(Request $request){
           
           $user=User::find($request['id']);
           $user->roles()->detach();

          if($request['user']){
              $user->roles()->attach(Role::where('name','user')->first());
          }
          if($request['editor']){
            $user->roles()->attach(Role::where('name','editor')->first());
          }
            if($request['admin']){
            $user->roles()->attach(Role::where('name','admin')->first());
          }
          return redirect()->back();
    }
    public function accessDenied(){
        return view('content.accessDenied');
    }
    public function like(Request $request){
    
          $post_id=$request->post_id;
          $is_like=0;
          $change_like=0;
          $like=Like::where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
          if(!$like){
            $new_like=new Like;
            $new_like->post_id=$post_id;
            $new_like->user_id=Auth::user()->id;
            $new_like->like=1;
            $new_like->save();
            $is_like=1;
          }
          elseif($like->like==1){
            $like->delete();
            $is_like=0;
          } 
          elseif ($like->like==0) {
            $like->like=1;
            $like->save();
            $is_like=1;
            $change_like=1;
          }
          $response=array(
            'is_like'=>$is_like,
            'change_like'=>$change_like
          );
          return response()->json($response,200);
    }
      public function dislike(Request $request){
        
          $like_s=$request->like_s;
          $post_id=$request->post_id;
          $is_dislike=0;
          $change_like=0;
          $dislike=Like::where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
          if(!$dislike){
            $new_dislike=new Like;
            $new_dislike->post_id=$post_id;
            $new_dislike->user_id=Auth::user()->id;
            $new_dislike->like=0;
            $new_dislike->save();
            $is_dislike=1;
          }
          elseif($dislike->like==0){
            $dislike->delete();
            $is_dislike=0;
          } 
          elseif ($dislike->like==1) {
            $dislike->like=0;
            $dislike->save();
            $is_dislike=1;
            $change_like=1;
          }
          $response=array(
            'is_dislike'=>$is_dislike,
            'change_like'=>$change_like
          );
          return response()->json($response,200);
    }

    public function statistics(){
      $users=User::count();
      $posts=Post::count();
      $comments=Comment::count();
      $most_comments=User::withCount('comments')->orderBy('comments_count','desc')->first();
      $check_likes=Like::where('user_id',$most_comments->id)->count();
      $user1_count=$most_comments->comments_count+$check_likes;
      $most_likes=User::withCount('likes')->orderBy('likes_count','desc')->first();
      $check_comments=Comment::where('user_id',$most_likes->id)->count();
      $user2_count=$most_likes->likes_count+$check_comments;
      if($user1_count>$user2_count){
        $active_user=$most_comments->name;
        $active_user_likes=$check_likes;
        $active_user_comments=$most_comments->comments_count;
      }else{
        $active_user=$most_likes->name;
        $active_user_likes=$most_likes->likes_count;
        $active_user_comments=$check_comments;
      }
      $statistics=array(
        'users'=>$users,
        'posts'=>$posts,
        'comments'=>$comments,
        'active_user'=>$active_user,
        'active_user_likes'=>$active_user_likes,
        'active_user_comments'=>$active_user_comments

      );
      return view('content.statistics',compact('statistics'));
    }

    public function setting(Request $request){

         $setting=Setting::where('name','stop_comment')->first();
         
         if($request->stop_comment){
          
           $setting->value=1;
         }
         else{
           $setting->value=0;
         }
         $setting->save();
         $setting=Setting::where('name','stop_register')->first();
         
         if($request->stop_register){
          
           $setting->value=1;
         }
         else{
           $setting->value=0;
         }
         $setting->save();
         return redirect()->back();
    }
}
