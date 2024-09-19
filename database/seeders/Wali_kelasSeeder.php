<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Wali_kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wali_kelas')->insert([
            [
                'wali_kelas_id' => 1,
                'siswa_id' => 5,
                'pemasukan' => 50000,
                'pengeluaran' => 8000,
                'saldo' => 42000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wali_kelas_id' => 1,
                'siswa_id' => 6,
                'pemasukan' => 30000,
                'pengeluaran' => 5000,
                'saldo' => 25000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wali_kelas_id' => 1,
                'siswa_id' => 7,
                'pemasukan' => 40000,
                'pengeluaran' => 5000,
                'saldo' => 35000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wali_kelas_id' => 1,
                'siswa_id' => 8,
                'pemasukan' => 30000,
                'pengeluaran' => 5000,
                'saldo' => 25000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'wali_kelas_id' => 1,
                'siswa_id' => 9,
                'pemasukan' => 30000,
                'pengeluaran' => 5000,
                'saldo' => 25000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wali_kelas_id' => 1,
                'siswa_id' => 10,
                'pemasukan' => 30000,
                'pengeluaran' => 5000,
                'saldo' => 25000, 
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}