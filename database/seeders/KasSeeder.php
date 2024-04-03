<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kas')->insert(
            [
                'kartu_keluarga_id' => 1,
                'jumlah_kas' => 15000,
                'tanggal_kas' => now()
            ]
        );
    }
}
