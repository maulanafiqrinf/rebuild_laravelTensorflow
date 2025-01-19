<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert default admin user
        DB::table('users')->insert([
            [
                'name' => 'Maulana Fiqri',
                'email' => 'fiqrin1805@gmail.com',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
