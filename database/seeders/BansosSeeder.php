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
            'kartu_keluarga_id' => 1,
            'tanggal_bansos' => now(),
            'jumlah_tanggungan' => 4,
            'nama_pengaju' => 'tak awur',
            'total_pendapatan' => 3000000,
            'luas_rumah' => 12.5,
            'luas_tanah' => 30.5,
            'jumlah_kendaraan' => 2,
            'jumlah_watt' => 90,
        ]);
    }
}
