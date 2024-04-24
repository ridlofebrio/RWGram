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
            [
                'bansos_id' => 4,
                'kartu_keluarga_id' => 4,
                'tanggal_bansos' => now(),
                'jumlah_tanggungan' => 6,
                'nama_pengaju' => 'Dewi Wulandari',
                'total_pendapatan' => 1800000,
                'luas_rumah' => 45,
                'luas_tanah' => 95,
                'jumlah_kendaraan' => 1,
                'jumlah_watt' => 400,
            ],
            [
                'bansos_id' => 5,
                'kartu_keluarga_id' => 5,
                'tanggal_bansos' => now(),
                'jumlah_tanggungan' => 4,
                'nama_pengaju' => 'Hadi Susilo',
                'total_pendapatan' => 2200000,
                'luas_rumah' => 35,
                'luas_tanah' => 75,
                'jumlah_kendaraan' => 1,
                'jumlah_watt' => 350,
            ],
        ];
        
        DB::table('bansos')->insert($data);
    }
}
