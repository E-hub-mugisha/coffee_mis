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
        Schema::create('coffee_tips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('season')->nullable(); // e.g. "Dry Season", "Rainy Season"
            $table->string('category')->nullable(); // e.g. "Harvesting", "Storage", etc.
            $table->string('image')->nullable(); // URL or path to the image
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // author
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_tips');
    }
};
