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
        Schema::create('coffee_product_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('coffee_purchase_orders');
            $table->foreignId('product_id')->constrained('coffee_products');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_product_orders');
    }
};
