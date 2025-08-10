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
        Schema::table('users', function (Blueprint $table) {
            $table->string('current_academic_year')->nullable()->after('name');
            $table->unsignedBigInteger('current_academic_year_id')->constrained()->nullable()->after('current_academic_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('current_academic_year');
            $table->dropForeign(['current_academic_year_id']);
            $table->dropColumn('current_academic_year_id');
        });
    }
};
