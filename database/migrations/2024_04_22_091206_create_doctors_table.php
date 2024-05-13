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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dep_id')->constrained('departments');
            $table->bigInteger('license_no');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('gender',['male','female','others']);
            $table->date('dob_bs');
            $table->date('dob_ad');
            $table->string('image_file');
            $table->integer('phone');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('permanent_province_id')->constrained('provinces');
            $table->foreignId('permanent_district_id')->constrained('districts');
            $table->foreignId('permanent_municipality_id')->constrained('municipalities');
            $table->string('permanent_street_name');
            $table->foreignId('temporary_province_id')->constrained('provinces');
            $table->foreignId('temporary_district_id')->constrained('districts');
            $table->foreignId('temporary_municipality_id')->constrained('municipalities');
            $table->string('temporary_street_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
