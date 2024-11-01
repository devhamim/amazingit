<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop_order_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('shopproduct_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('note')->nullable();
            $table->string('mobile_verify')->nullable();
            $table->string('price');
            $table->string('coupon')->nullable();
            $table->string('total');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_order_products');
    }
};
