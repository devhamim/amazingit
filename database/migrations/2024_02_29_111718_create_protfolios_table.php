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
        Schema::create('protfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('project_type');
            $table->date('delivery_date')->nullable();
            $table->string('client')->nullable();
            $table->string('tage')->nullable();
            $table->integer('status')->default(1);
            $table->string('preview_image')->nullable();
            $table->string('website_link')->nullable();
            $table->text('slug');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protfolios');
    }
};
