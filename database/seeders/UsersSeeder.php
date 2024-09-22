<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'nama' => 'Bambang',
        //     'email' => 'kepsek@example.com',
        //     'password' => Hash::make('password123'), // Ubah sesuai kebutuhan
        //     'role' => 'kepala_sekolah',
        // ]);

    }
}