<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'customer_name',
        'product_id',
        'productname_id',
        'quantity',
        'single_price',
        'price',
        'add_cost',
        'vat',
        'tax',
        'user_id'
    ];

    //__Join with Productname__//
    public function Productname(){
        return $this->belongsTo('App\Models\Productname', 'productname_id', 'id'); 
    }

    //__Join with Quantity__//
     public function Quantity(){
        return $this->belongsTo('App\Models\Quantity', 'quantity_id', 'id'); 
    }

    //__Join with User__//
    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id'); 
    }

    //__Join with Product __//
    public function product(){
        return $this->belongsToMany('App\Models\Product', 'product_sale')->withTimestamps(); 
    }
}
