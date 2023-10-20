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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('name');
            $table->bigInteger('number');
            $table->string('email');
            $table->string('address');
            $table->integer('pincode');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('landmark');
            $table->string('product_status');
            $table->string('delivery_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
