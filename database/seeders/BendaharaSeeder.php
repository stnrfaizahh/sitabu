<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BendaharaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bendahara')->insert([
            [
                'bendahara_id' => 1,
                'user_id' => 2, 
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}