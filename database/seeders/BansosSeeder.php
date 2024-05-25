<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'bansos_id' => 1,
                'kartu_keluarga_id' => 1,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Budi Santoso',
                'c1' => 2000000,
                'c2' => 5,
                'c3' => 50,
                'c4' => 100,
                'c5' => 1,
                'c6' => 450,

            ],
            [
                'bansos_id' => 2,
                'kartu_keluarga_id' => 2,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Siti Rahayu',
                'c1' => 1500000,
                'c2' => 3,
                'c3' => 30,
                'c4' => 70,
                'c5' => 0,
                'c6' => 300,
            ],
            [
                'bansos_id' => 3,
                'kartu_keluarga_id' => 3,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Agus Setiawan',
                'c1' => 2500000,
                'c2' => 2,
                'c3' => 40,
                'c4' => 80,
                'c5' => 2,
                'c6' => 500,
            ],
            [
                'bansos_id' => 4,
                'kartu_keluarga_id' => 4,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Dewi Wulandari',
                'c1' => 1800000,
                'c2' => 6,
                'c3' => 45,
                'c4' => 95,
                'c5' => 1,
                'c6' => 400,
            ],
            [
                'bansos_id' => 5,
                'kartu_keluarga_id' => 5,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Hadi Susilo',
                'c1' => 2200000,
                'c2' => 4,
                'c3' => 35,
                'c4' => 75,
                'c5' => 1,
                'c6' => 350,
            ],
        ];

        DB::table('bansos')->insert($data);
    }
}
