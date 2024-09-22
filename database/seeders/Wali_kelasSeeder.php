<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Walikelas;

class Wali_kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Walikelas::create([
            'siswa_id' => 1, // Asumsi siswa dengan ID 1 sudah ada
            'pemasukan' => 100000,
            'pengeluaran' => 20000,
            'saldo' => 80000,
        ]);

        Walikelas::create([
            'siswa_id' => 2, // Asumsi siswa dengan ID 2 sudah ada
            'pemasukan' => 50000,
            'pengeluaran' => 10000,
            'saldo' => 40000,
        ]);
    }
}