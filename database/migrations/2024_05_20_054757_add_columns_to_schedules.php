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
        Schema::table('schedules', function (Blueprint $table) {
            $table->boolean('status')->comment('1 = available, 0 = unavailable')->default('1')->after('to');
            $table->string('days')->after('date');
            $table->integer('total_quota')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('days');
            $table->dropColumn('total_quota');
        });
    }
};
