<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kepala_SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kepala_sekolah')->insert([
            [
                'kepala_sekolah_id' => 1,
                'user_id' => 1, // Relasi ke user Dewi Kepala Sekolah
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}