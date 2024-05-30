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
        Schema::create('doctorExperience', function (Blueprint $table) {
            $table->foreignId('doc_id')->constrained('doctors');
            $table->string('organization');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('description');
            $table->integer('start_date_bs');
            $table->integer('start_date_ad');
            $table->integer('end_date_bs');
            $table->integer('end_date_ad');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
