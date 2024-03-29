<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bansos')->insert([
            'bansos_id' => 1,
            'tanggal_bansos' => now(),
            'nama_bansos' => 'pemerintah',
            'created_at' => now()
        ]);
    }
}
