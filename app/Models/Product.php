<?php

namespace App\Models;

use App\Models\{Category,Subcategory,Productname};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
    ];

    //__Join with Category__//
    public function Category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id'); 
    }
     //__Join with Subcategory__//
    public function Subcategory(){
        return $this->belongsTo('App\Models\Subcategory', 'subcategory_id', 'id'); 
    }

}
