<?php

use Database\Seeders\ProvinceSeeder;
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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->nullable();
            $table->string('nepali_name');
            $table->string('english_name');
            $table->timestamps();
            $table->softDeletes();

        });
        $seeder = new ProvinceSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
