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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('added_by');
            $table->string('order_id');
            $table->date('delivery_date')->nullable();
            $table->integer('invoice_id');
            $table->integer('sub_total');
            $table->integer('discount')->default(0);
            $table->integer('paid');
            $table->integer('due');
            $table->string('company_name');
            $table->string('lead_customer');
            $table->longText('order_note')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
