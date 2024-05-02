<?php

use Database\Seeders\MunicipalitySeeder;
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
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muni_type_id')->constrained('muni_types');
            $table->foreignId('district_id')->constrained('districts');
            $table->string('muni_code');
            $table->string('muni_name');
            $table->string('muni_name_eng');
            $table->timestamps();
            $table->softDeletes();
        });

        // $seeder = new MunicipalitySeeder();
        // $seeder->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipalities');
    }
};
