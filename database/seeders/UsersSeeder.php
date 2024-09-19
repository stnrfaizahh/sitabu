<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => 5,
                'nama' => 'farel',
                'email' => 'siswa5@example.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ],
            [
                'user_id' => 6,
                'nama' => 'Farah',
                'email' => 'siswa6@example.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ],
            [
                'user_id' => 7,
                'nama' => 'didi',
                'email' => 'siswa7@example.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ],
            [
                'user_id' => 8,
                'nama' => 'sisi',
                'email' => 'siswa8@example.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ],
            [
                'user_id' => 9,
                'nama' => 'ali',
                'email' => 'siswa9@example.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ],
            [
                'user_id' => 10,
                'nama' => 'fina',
                'email' => 'siswa10@example.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa'
            ],
            // [
            //     'user_id' => 2,
            //     'nama' => 'Budi Wali Kelas',
            //     'email' => 'wakel@example.com',
            //     'password' => Hash::make('password123'),
            //     'role' => 'wali_kelas'
            // ],
            // [
            //     'user_id' => 3,
            //     'nama' => 'Cici Bendahara',
            //     'email' => 'bendahara@example.com',
            //     'password' => Hash::make('password123'),
            //     'role' => 'bendahara'
            // ],
            // [
            //     'user_id' => 4,
            //     'nama' => 'Dewi Kepala Sekolah',
            //     'email' => 'kepsek@example.com',
            //     'password' => Hash::make('password123'),
            //     'role' => 'kepala_sekolah'
            // ]
        ]);
    
    }
}