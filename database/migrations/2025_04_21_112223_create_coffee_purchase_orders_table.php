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
        Schema::create('coffee_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('users'); // Assuming there's a 'users' table
            $table->foreignId('cooperative_id')->constrained('cooperatives'); // Assuming there's a 'cooperatives' table
            $table->decimal('total_price', 10, 2)->default(0);
            $table->enum('status', ['pending', 'processed', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->text('delivery_address');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_purchase_orders');
    }
};
