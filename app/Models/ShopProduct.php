<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function rel_to_category() {
        return $this->belongsTo(shopcategory::class, 'category_id');
    }


    function rel_to_shopgallery() {
        return $this->hasMany(shopproductgallery::class, 'shopproduct_id');
    }
}
