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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_registration_id');
            $table->string('bank_name');
            $table->enum('payment_method', ['mobile', 'bank_transfer']);
            $table->string('account_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('payment_type', ['fully Paid', 'partially Paid'])->default('fully Paid');
            $table->string('transaction_image')->nullable();
            $table->string('payment_note')->nullable();
            $table->string('transaction_note')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->string('status_message')->nullable();
            $table->foreign('student_registration_id')->references('id')->on('student_registrations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
