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
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->enum('payment_type', ['full_paid', 'partial_paid'])->default('partial_paid')->after('agree_rules');
            $table->boolean('is_payment_requested')->default(false)->after('payment_type');
            $table->boolean('is_payment_completed')->default(false)->after('is_payment_requested');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            //
        });
    }
};
