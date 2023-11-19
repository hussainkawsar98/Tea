<?php

namespace App\Models;

use App\Models\{Category,Subcategory,Productname};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productname extends Model
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

    //__Join with Product__//
    public function Product(){
        return $this->hasMany('App\Models\Product', 'productname_id', 'id'); 
    }


    //__Join with Purchase__//
    public function Purchase(){
        return $this->hasMany('App\Models\Purchase', 'purchase_id', 'id'); 
    }

}
