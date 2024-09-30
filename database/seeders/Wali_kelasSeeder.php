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
            'user_id' => 3,
            'nama' => 'Wali Kelas 1',
            'kelas' => 'Kelas 1A',
            'pemasukan' => 5000000,
            'pengeluaran' => 2000000,
            'saldo' => 3000000,
        ]);

        Walikelas::create([
            'user_id' => 4,
            'nama' => 'Wali Kelas 2',
            'kelas' => 'kelas 2A',
            'pemasukan' => 5000000,
            'pengeluaran' => 2000000,
            'saldo' => 3000000,
        ]);

        // Output untuk konfirmasi
        $this->command->info("Seeder Wali Kelas berhasil dijalankan.");
    }
}