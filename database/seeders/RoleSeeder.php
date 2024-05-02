<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();
        $roles = [
            [
            'id' => 1,
            'name' => 'admin',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime
            ],
            [
            'id' => 2,
            'name' => 'doctor',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
