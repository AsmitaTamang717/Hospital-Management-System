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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('image_file')->after('license_no');
            $table->integer('phone')->after('dob_ad');
        });

        Schema::table('education', function (Blueprint $table) {
            $table->integer('completion_year_bs')->after('institution');
            $table->integer('completion_year_ad')->after('completion_year_bs');
        });

        Schema::table('experience', function (Blueprint $table) {
            $table->integer('start_date_bs')->after('position');
            $table->integer('start_date_ad')->after('start_date_bs');
            $table->integer('end_date_bs')->after('start_date_ad');
            $table->integer('end_date_ad')->after('end_date_bs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn('completion_year_bs');
            $table->dropColumn('completion_year_ad');
        });

        Schema::table('experience', function (Blueprint $table) {
            $table->dropColumn('start_date_bs');
            $table->dropColumn('start_date_ad');
            $table->dropColumn('end_date_bs');
            $table->dropColumn('end_date_ad');
        });
    }
};
