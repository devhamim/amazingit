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
        Schema::create('message_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('frontorder')->default(1);
            $table->string('orderstore')->default(1);
            $table->string('ongoing')->default(1);
            $table->string('duepayment')->default(1);
            $table->string('refund')->default(1);
            $table->string('completed')->default(1);
            $table->string('canceled')->default(1);
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_statuses');
    }
};
