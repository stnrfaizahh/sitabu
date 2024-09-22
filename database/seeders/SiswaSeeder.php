<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'user_id' => 3, // Asumsi user dengan ID 3 adalah Siswa 1
            'wali_kelas_id' => 1, // Relasi dengan wali kelas
        ]);

        Siswa::create([
            'user_id' => 4, // Asumsi user dengan ID 4 adalah Siswa 2
            'wali_kelas_id' => 1, // Relasi dengan wali kelas
        ]);
    }
}