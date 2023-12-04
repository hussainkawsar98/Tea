<?php

namespace App\Models;

use App\Models\Productname;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'productname_id',
        'quantity_id',
        'quantity',
        'price',
        'add_cost',
        'tax',
        'vat',
    ];

    //__Join with Productname__//
    public function Productname(){
        return $this->belongsTo('App\Models\Productname', 'productname_id', 'id'); 
    }

    //__Join with Quantity __//
     public function Quantity(){
        return $this->belongsTo('App\Models\Quantity', 'quantity_id', 'id'); 
    }

    //__ Join With Sale __//
    public function sale(){
        return $this->belongsToMany('App\Models\Sale', 'product_sale')->withTimestamps();
    }
}
