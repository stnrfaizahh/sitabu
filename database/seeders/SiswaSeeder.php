<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'siswa_id' => 2,
                'user_id' => 5, // Relasi ke user Ahmad Siswa
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'siswa_id' => 3,
                'user_id' => 6, // Relasi ke user Ahmad Siswa
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'siswa_id' => 4,
                'user_id' => 7, // Relasi ke user Ahmad Siswa
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'siswa_id' => 5,
                'user_id' => 8, // Relasi ke user Ahmad Siswa
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'siswa_id' => 6,
                'user_id' => 9, // Relasi ke user Ahmad Siswa
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'siswa_id' => 7,
                'user_id' => 10, // Relasi ke user Ahmad Siswa
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}