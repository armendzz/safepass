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
        // Create passwords table
        Schema::create('passwords', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('encryped_password');
            $table->text('description')->nullable();
            $table->string('type')->default('password');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Add created_by field
            $table->timestamps();
        });

        // Create user_password table to manage user-password relationships
        Schema::create('user_password', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->uuid('password_id'); // Change to UUID type
            $table->foreign('password_id')->references('id')->on('passwords')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_password');
        Schema::dropIfExists('passwords');
    }
};

