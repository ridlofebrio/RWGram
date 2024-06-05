<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepalaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kartu_keluarga_id' => 1,
                'penduduk_id' => 1,
            ],
            [
                'kartu_keluarga_id' => 2,
                'penduduk_id' => 3,
            ],
            [
                'kartu_keluarga_id' => 3,
                'penduduk_id' => 5,
            ],

            [
                'kartu_keluarga_id' => 5,
                'penduduk_id' => 4,
            ],
            [
                'kartu_keluarga_id' => 6,
                'penduduk_id' => 6,
            ],
            [
                'kartu_keluarga_id' => 7,
                'penduduk_id' => 7,
            ],
            [
                'kartu_keluarga_id' => 8,
                'penduduk_id' => 8,
            ],
            [
                'kartu_keluarga_id' => 9,
                'penduduk_id' => 9,
            ],
            [
                'kartu_keluarga_id' => 10,
                'penduduk_id' => 10,
            ],
        ];

        DB::table('kepala_keluarga')->insert(
            $data
        );
    }
}
