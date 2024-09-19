<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Laporan_bendaharaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laporan_bendahara')->insert([
            [
                
                'bendahara_id' => 1, // Relasi ke bendahara Cici Bendahara
                'total_penarikan' => 50000,
                'total_setoran' => 100000,
                'periode_bulan' => 'September', // Pastikan tipe data sesuai dengan kolom di tabel
                'periode_tahun' => 2024, // Gunakan tipe data yang sesuai dengan kolom di tabel
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}