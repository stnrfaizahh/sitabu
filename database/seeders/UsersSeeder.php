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
        User::create([
            'nama' => 'Bambang',
            'email' => 'kepsek@example.com',
            'password' => Hash::make('password123'), // Ubah sesuai kebutuhan
            'role' => 'kepala_sekolah',
        ]);
        User::create([
            'nama' => 'Buna',
            'email' => 'bendahara@example.com',
            'password' => Hash::make('password123'),
            'role' => 'bendahara',
        ]);

        User::create([
            'nama' => 'Salsa',
            'email' => 'walikelas@example.com',
            'password' => Hash::make('password123'),
            'role' => 'wali_kelas',
        ]);
        User::create([
            'nama' => 'Budi',
            'email' => 'wakel@example.com',
            'password' => Hash::make('password123'),
            'role' => 'wali_kelas',
        ]);

        User::create([
            'nama' => 'Rara',
            'email' => 'siswa1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
        User::create([
            'nama' => 'Riri',
            'email' => 'siswa2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
        User::create([
            'nama' => 'ari',
            'email' => 'siswa3@example.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
        User::create([
            'nama' => 'aryo',
            'email' => 'siswa4@example.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
    }
}