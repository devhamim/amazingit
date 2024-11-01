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
        Schema::create('service_order_carts', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('product_id');
            $table->string('name');
            $table->string('phone');
            $table->string('business_name');
            $table->string('note')->nullable();
            $table->string('mobile_verify')->nullable();
            $table->string('quantity')->default(1);
            $table->string('price');
            $table->string('sub_total');
            $table->string('coupon')->nullable();
            $table->string('total');
            $table->integer('status')->default(0);
            $table->integer('permission')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_order_carts');
    }
};
