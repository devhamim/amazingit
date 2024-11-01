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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('preview_image')->nullable();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('author')->nullable();
            $table->longText('description');
            $table->string('tage')->nullable();
            $table->string('category');
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('image_alt_tag')->nullable();
            $table->string('preview_image_alt_tag')->nullable();
            $table->longText('slug');
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};