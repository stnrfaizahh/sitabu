<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TabunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabungan')->insert([
            [
                'tabungan_id' => 1,
                'siswa_id' => 3, // Relasi ke siswa Ahmad Siswa
                'jumlah_transaksi' => 100000,
                'jenis_transaksi' => 'setor',
                'saldo' => 100000,
                'tanggal_transaksi' => now()
            ],
            [
                'tabungan_id' => 2,
                'siswa_id' => 3,
                'jumlah_transaksi' => 50000,
                'jenis_transaksi' => 'tarik',
                'saldo' => 50000,
                'tanggal_transaksi' => now()
            ]
        ]);
    }
}