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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user'); // Default role is 'user'
            $table->string('profile_picture')->nullable(); // Optional profile picture
            $table->string('remember_token')->nullable(); // For "remember me" functionality
            $table->timestamp('email_verified_at')->nullable(); // For email verification
            $table->string('phone')->unique()->nullable(); // Optional phone number
            $table->string('city')->nullable(); // Optional address
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
