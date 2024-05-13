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
        Schema::create('doctorEducation', function (Blueprint $table) {
            $table->foreignId('doc_id')->constrained('doctors');
            $table->string('degree');
            $table->string('specialization');
            $table->integer('completion_year');
            $table->string('institution');
            $table->integer('obtained_marks');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
