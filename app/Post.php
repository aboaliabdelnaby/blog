<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function comments(){
    	return $this->hasMany(Comment::class);
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
     public function likes(){
    	return $this->hasMany(Like::class);
    }
}
