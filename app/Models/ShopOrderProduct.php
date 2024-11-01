<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrderProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_product(){
        return $this->belongsTo(ShopProduct::class, 'shopproduct_id');
    }
}
