<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class Laporan_kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        // Anda bisa menambahkan data yang sesuai dengan kebutuhan Anda
        // Misalnya, menambahkan 10 data laporan_kelas
      {
            DB::table('laporan_kelas')->insert([
                'wali_kelas_id' => '1',
                'total_penarikan' => '40245.81',
                'total_setoran' => '32154', // Total setoran antara 1000 dan 50000
                'periode_bulan' => '4', // Bulan antara 1 dan 12
                'periode_tahun' => '2024', // Tahun acak
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}