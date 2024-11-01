<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billingdetails extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rel_to_orderpro(){
        return $this->hasMany(OrderProduct::class, 'order_id', 'order_id');
    }

    public function rel_to_order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

}
