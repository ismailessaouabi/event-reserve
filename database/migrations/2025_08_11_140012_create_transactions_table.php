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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->decimal('amount', 10, 2); // Amount of the transaction
            $table->string('payment_method'); // Payment method used (e.g., credit card, PayPal)
            $table->string('status')->default('pending'); // Status of the transaction (e.g., pending, completed, failed)
            $table->timestamp('transaction_date')->useCurrent(); // Date and time of the transaction
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
