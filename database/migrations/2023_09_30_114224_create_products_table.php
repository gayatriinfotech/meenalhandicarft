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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcate_id');
            $table->string('sku_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('description');
            $table->float('mrp');
            $table->float('retail_price');
            $table->float('wholesale_price');
            $table->string('material');
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('weight');
            $table->string('tags');
            $table->string('shop_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
