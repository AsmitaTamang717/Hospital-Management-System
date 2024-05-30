<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            [
                'module_name' => 'Department',
                'slug' => Str::slug('Department'),
                'module_link' => '/department',
            ],
            [
                'module_name' => 'Gallery',
                'slug' => Str::slug('Gallery'),
                'module_link' => '/gallery',
            ],
        ]);
    }
}
