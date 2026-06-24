<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@company.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Optional: Tambah user lain untuk testing
        DB::table('users')->insert([
            'name' => 'User Test',
            'email' => 'user@company.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}