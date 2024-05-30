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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id')->constrained('doctors');
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('patient_id')->constrained('patients');
            $table->time('time_interval');
            $table->enum('status',['pending','approved','cancel'])->default('pending');
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
