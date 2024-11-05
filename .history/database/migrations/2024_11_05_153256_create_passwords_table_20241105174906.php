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
            $table->text('encrypted_password');
            $table->text('description')->nullable();
            $table->string('type')->default('password');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Add created_by field
            $table->timestamps();
        });

        Schema::create('user_password', function (Blueprint $table) {
            $table->id(); // This is the primary key for the pivot table
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Ensure user_id is correct
            $table->uuid('password_id'); // Ensure this matches the UUID type in the passwords table
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('password_id')->references('id')->on('passwords')->onDelete('cascade');
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

