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
        Schema::table('students', function (Blueprint $table) {
            $table->enum('gender', [1,2])->default(1)->after('dob');
            $table->string('fee')->default(0)->after('gender'); 
            $table->enum('language', [0,1,2,3,4])->default(0)->after('fee');
            $table->enum('status', [0,1])->default(1)->after('language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('fee');
            $table->dropColumn('language');
            $table->dropColumn('status');
        });
    }
};
