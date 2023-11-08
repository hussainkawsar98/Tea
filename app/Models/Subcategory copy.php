<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'subcategory_name', 'subcategory_slug',
    ];

    //__Join with Productname__//
     public function Productname(){
        return $this->hasMany('App\Models\Productname', 'subcategory_id', 'id'); 
    }

    //__Join with Category__//
    public function Category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id'); 
    }
    
}
