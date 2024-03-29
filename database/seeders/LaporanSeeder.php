<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $keluhan = array('keluhan', 'pengajuan', 'entah');

        for ($i = 1; $i <= 3; $i++) {
            DB::table('laporan')->insert(
                [
                    'laporan_id' => $i,
                    'penduduk_id' => 1,
                    'jenis_laporan' => $keluhan[$i - 1],
                    'deskripsi_laporan' => $faker->sentence(),
                    'status_laporan' => 'Menunggu',
                    'tanggal_laporan' => now(),
                    'created_at' => now()
                ]
            );
        }
    }
}
