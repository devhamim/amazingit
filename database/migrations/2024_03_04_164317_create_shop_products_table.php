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
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('after_discount');
            $table->string('sku')->nullable();
            $table->longText('video_link')->nullable();
            $table->longText('download_link')->nullable();
            $table->longText('preview_product')->nullable();
            $table->string('preview_image')->nullable();
            $table->string('slug');
            $table->longText('sort_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('tags');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_products');
    }
};
