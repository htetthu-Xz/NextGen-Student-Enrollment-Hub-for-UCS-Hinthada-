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
            $table->string('current_father_name')->nullable()->after('name');
            $table->string('current_mother_name')->nullable()->after('current_father_name');
            $table->string('current_NRC')->nullable()->after('current_mother_name');
            $table->date('DOB')->nullable()->after('current_NRC');
            $table->text('permanent_address')->nullable()->after('DOB');
            $table->string('phone')->nullable()->after('permanent_address');
            $table->string('major')->nullable()->after('current_academic_year_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('current_father_name');
            $table->dropColumn('current_mother_name');
            $table->dropColumn('current_NRC');
            $table->dropColumn('DOB');
            $table->dropColumn('permanent_address');
            $table->dropColumn('phone');
            $table->dropColumn('major');
        });
    }
};
