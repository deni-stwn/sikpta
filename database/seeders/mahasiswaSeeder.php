<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;    // Tambahkan ini
use Illuminate\Support\Facades\Hash;  // Tambahkan ini
use Illuminate\Support\Str;    
class mahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('users')->updateOrInsert(
                ['username' => 'mahasiswa'], // Cek jika username 'admin' sudah ada
                [
                    'name' => 'Alvin Ganteng',
                    'role' => 'mahasiswa',
                    'email' => 'mahasiswa@example.com',
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
