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
            $table->timestamps();
        });

        // Create user_password table to manage user-password relationships
        Schema::create('user_password', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('password_id')->constrained('passwords')->onDelete('cascade');
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

