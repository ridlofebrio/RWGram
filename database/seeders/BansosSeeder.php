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
                'bansos_id' => 5,
                'kartu_keluarga_id' => 5,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Susi Ayu',
                'c1' => 1800000,
                'c2' => 3,
                'c3' => 35,
                'c4' => 75,
                'c5' => 1,
                'c6' => 320,
            ],
            [
                'bansos_id' => 6,
                'kartu_keluarga_id' => 6,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Alif Rahmat',
                'c1' => 3000000,
                'c2' => 3,
                'c3' => 50,
                'c4' => 80,
                'c5' => 2,
                'c6' => 400,
            ],
            [
                'bansos_id' => 7,
                'kartu_keluarga_id' => 7,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Kunto Purma',
                'c1' => 2800000,
                'c2' => 4,
                'c3' => 45,
                'c4' => 80,
                'c5' => 2,
                'c6' => 410,
            ],
            [
                'bansos_id' => 8,
                'kartu_keluarga_id' => 8,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Agung Hadi',
                'c1' => 1900000,
                'c2' => 3,
                'c3' => 40,
                'c4' => 75,
                'c5' => 0,
                'c6' => 250,
            ],
            [
                'bansos_id' => 9,
                'kartu_keluarga_id' => 9,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Manto Supri',
                'c1' => 2800000,
                'c2' => 2,
                'c3' => 35,
                'c4' => 60,
                'c5' => 1,
                'c6' => 300,
            ],
            [
                'bansos_id' => 10,
                'kartu_keluarga_id' => 10,
                'tanggal_bansos' => now(),
                'nama_pengaju' => 'Gilang Adi',
                'c1' => 3100000,
                'c2' => 2,
                'c3' => 30,
                'c4' => 60,
                'c5' => 2,
                'c6' => 350,
            ],
        ];

        DB::table('bansos')->insert($data);
    }
}
