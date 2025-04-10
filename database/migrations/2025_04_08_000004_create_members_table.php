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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cooperative_id'); // FK to cooperatives table

            $table->string('full_name');
            $table->string('national_id')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('role')->default('Producer'); // Producer, Manager, Admin
            $table->text('address')->nullable();
            $table->date('join_date')->nullable();
            $table->string('profile_photo')->nullable(); // optional profile image

            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('deactivation_reason')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('cooperative_id')->references('id')->on('cooperatives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
