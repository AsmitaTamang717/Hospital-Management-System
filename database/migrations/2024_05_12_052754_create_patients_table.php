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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->enum('gender',['male','female','others']);
            $table->date('dob');
            $table->integer('age');
            $table->string('permanent_address');
            $table->string('temporary_address')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('message')->nullable();
            $table->string('medical_history')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
