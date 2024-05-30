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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('display_order');
            $table->integer('menu_type_id');
            $table->foreignId('parent_id')->constrained('menus')->nullable();
            $table->foreignId('module_id')->constrained('modules')->nullable();
            $table->foreignId('page_id')->constrained('pages')->nullable();
            $table->json('menu_name');
            $table->string('external_link')->nullable();
            $table->boolean('status')->comment('1 = active, 0 = inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
