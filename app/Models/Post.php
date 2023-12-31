<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category,User,Tag, Comment};

class Post extends Model
{
    use HasFactory;
    protected $guarded =  ['created_at', 'updated_at']; 

    protected $dates = ['published_at'];

    //__Join with Category__//
    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_posts')->withPivot('category_id')->withTimestamps(); 
    }
    //__Join with User__//
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //__Join with Tags__//
    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'post_tag')->withTimestamps(); 
    }

    //__Join with Comment//
    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }
}
