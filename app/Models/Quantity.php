<?php

namespace App\Models;

use App\Models\{Category,Subcategory,Productname};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'name',
    ];

    //__Join with Product__//
    public function Product(){
        return $this->hasMany('App\Models\Product', 'quantity_id', 'id'); 
    }

    //__Join with Purchase__//
    public function Purchase(){
        return $this->hasMany('App\Models\Purchase', 'purchase_id', 'id'); 
    }

}
