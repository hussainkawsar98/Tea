<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    protected $guarded =  ['created_at', 'updated_at']; 

    protected $dates = ['published_at'];

    public function post(){
        return $this->belongsToMany('App\Models\Post', 'post_tag')->withTimestamps();
    }
}
