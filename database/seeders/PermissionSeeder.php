<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'create role', 'guard_name' => 'web'],
            ['name' => 'edit role', 'guard_name' => 'web'],
            ['name' => 'view role', 'guard_name' => 'web'],
            ['name' => 'delete role', 'guard_name' => 'web'],

            ['name' => 'create user', 'guard_name' => 'web'],
            ['name' => 'view user', 'guard_name' => 'web'],
            ['name' => 'edit user', 'guard_name' => 'web'],
            ['name' => 'delete user', 'guard_name' => 'web'],

            ['name' => 'create department', 'guard_name' => 'web'],
            ['name' => 'view department', 'guard_name' => 'web'],
            ['name' => 'edit department', 'guard_name' => 'web'],
            ['name' => 'delete department', 'guard_name' => 'web'],

            ['name' => 'create doctor', 'guard_name' => 'web'],
            ['name' => 'edit doctor', 'guard_name' => 'web'],
            ['name' => 'view doctor', 'guard_name' => 'web'],
            ['name' => 'delete doctor', 'guard_name' => 'web'],

            ['name' => 'create schedule', 'guard_name' => 'web'],
            ['name' => 'view schedule', 'guard_name' => 'web'],
            ['name' => 'edit schedule', 'guard_name' => 'web'],
            ['name' => 'delete schedule', 'guard_name' => 'web'],

            ['name' => 'create patient', 'guard_name' => 'web'],
            ['name' => 'edit patient', 'guard_name' => 'web'],
            ['name' => 'view patient', 'guard_name' => 'web'],
            ['name' => 'delete patient', 'guard_name' => 'web'],

            ['name' => 'create appointment', 'guard_name' => 'web'],
            ['name' => 'edit appointment', 'guard_name' => 'web'],
            ['name' => 'view appointment', 'guard_name' => 'web'],
            ['name' => 'delete appointment', 'guard_name' => 'web'],
        ]);
    }
}
