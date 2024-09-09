<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;    // Tambahkan ini
use Illuminate\Support\Facades\Hash;  // Tambahkan ini
use Illuminate\Support\Str;           // Tambahkan ini

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('users')->updateOrInsert(
                ['username' => 'admin'], // Cek jika username 'admin' sudah ada
                [
                    'name' => 'Admin',
                    'role' => 'admin',
                    'email' => 'admin@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password123'), // Pastikan password terenkripsi
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
