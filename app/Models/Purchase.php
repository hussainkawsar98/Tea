<?php

namespace App\Models;

use App\Models\Productname;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'productname_id',
        'quantity_id',
        'quantity',
        'price',
        'add_cost',
        'vat',
        'tax',
    ];

    //__Join with Productname__//
    public function Productname(){
        return $this->belongsTo('App\Models\Productname', 'productname_id', 'id'); 
    }

    //__Join with Quantity__//
     public function Quantity(){
        return $this->belongsTo('App\Models\Quantity', 'quantity_id', 'id'); 
    }


}
