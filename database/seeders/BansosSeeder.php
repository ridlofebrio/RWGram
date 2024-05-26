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
                'jumlah_tanggungan' => 5,
                'nama_pengaju' => 'Budi Santoso',
                'total_pendapatan' => 2000000,
                'luas_rumah' => 50,
                'luas_tanah' => 100,
                'jumlah_kendaraan' => 1,
                'jumlah_watt' => 450,

            ],
            [
                'bansos_id' => 2,
                'kartu_keluarga_id' => 2,
                'tanggal_bansos' => now(),
                'jumlah_tanggungan' => 3,
                'nama_pengaju' => 'Siti Rahayu',
                'total_pendapatan' => 1500000,
                'luas_rumah' => 30,
                'luas_tanah' => 70,
                'jumlah_kendaraan' => 0,
                'jumlah_watt' => 300,
            ],
            [
                'bansos_id' => 3,
                'kartu_keluarga_id' => 3,
                'tanggal_bansos' => now(),
                'jumlah_tanggungan' => 2,
                'nama_pengaju' => 'Agus Setiawan',
                'total_pendapatan' => 2500000,
                'luas_rumah' => 40,
                'luas_tanah' => 80,
                'jumlah_kendaraan' => 2,
                'jumlah_watt' => 500,
            ],

        ];

        DB::table('bansos')->insert($data);
    }
}
