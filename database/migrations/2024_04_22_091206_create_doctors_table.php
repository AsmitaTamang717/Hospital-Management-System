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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('gender',['male','female','others']);
            $table->date('dob_bs');
            $table->date('dob_ad');
            $table->bigInteger('license_no');
            $table->integer('temporary_province_no');
            $table->string('temporary_district');
            $table->string('temporary_municipality_name')->nullable();
            $table->integer('permanent_province_no');
            $table->string('permanent_district');
            $table->string('permanent_municipality_name')->nullable();
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
