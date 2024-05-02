<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'role_id' => 1,
                'username' => 'admin',
                'email' => 'admin12@gmail.com',
                'password' => Hash::make('admin12@')
            ]
        ];
        
        DB::table('users')->insert($admin);
    }
}
