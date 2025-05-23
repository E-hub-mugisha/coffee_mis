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
        Schema::table('coffee_orders', function (Blueprint $table) {
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coffee_orders', function (Blueprint $table) {
            //
        });
    }
};
