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
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cooperative_id')->constrained('cooperatives')->onDelete('cascade');
            $table->foreignId('farm_id')->constrained('farms')->onDelete('cascade');
            $table->foreignId('farmer_id')->constrained('farmers')->onDelete('cascade');
            $table->string('harvest_name'); // e.g., "2025 Coffee Harvest"
            $table->string('harvest_type'); // e.g., "Arabica", "Robusta"
            $table->date('harvest_date');
            $table->string('coffee_grade')->nullable(); // A1, A2, B, etc.
            $table->float('quantity'); // Quantity in KG or bags
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};
