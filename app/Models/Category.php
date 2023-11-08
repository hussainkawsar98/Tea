<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category,Subcategory,Productname};

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'name',
        'slug'
    ];

    //__Join with Subcategory__//
    public function Subcategory(){
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id'); 
    }
    //__Join with Subcategory__//
    public function Productname(){
        return $this->hasMany('App\Models\Productname', 'category_id', 'id'); 
    }
}
