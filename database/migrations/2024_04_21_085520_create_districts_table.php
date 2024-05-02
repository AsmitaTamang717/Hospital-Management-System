<?php

use Database\Seeders\DistrictSeeder;
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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('provinces');
            $table->integer('code');
            $table->string('district_name_nep');
            $table->string('district_name_eng');
            $table->timestamps();
            $table->softDeletes();

        });
        $seeder = new DistrictSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
