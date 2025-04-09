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
        Schema::create('coffee_products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the coffee product
            $table->decimal('price', 8, 2); // Price of the coffee product
            $table->string('description')->nullable(); // Optional description for the product
            $table->integer('quantity')->default(0); // Stock quantity
            $table->foreignId('harvest_id')->constrained('harvests')->onDelete('cascade'); // Foreign key to harvests table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_products');
    }
};
