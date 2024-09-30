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
            'user_id' => 5, 
            'wali_kelas_id' => 1,
            'kelas' => 'Kelas 1A', 
        ]);
        Siswa::create([
            'user_id' => 6, 
            'wali_kelas_id' => 1,
            'kelas' => 'Kelas 1A', 
        ]);
        Siswa::create([
            'user_id' => 7, 
            'wali_kelas_id' => 2,
            'kelas' => 'Kelas 2A', 
        ]);
        Siswa::create([
            'user_id' => 8, 
            'wali_kelas_id' => 2,
            'kelas' => 'Kelas 2A', 
        ]);
        


    }
}