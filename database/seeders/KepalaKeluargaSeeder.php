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
        $data =[
            [
                'kartu_keluarga_id' => 1,
                'penduduk_id' => 1,
            ],
            [
                'kartu_keluarga_id' => 2,
                'penduduk_id' => 2,
            ],
            [
                'kartu_keluarga_id' => 3,
                'penduduk_id' => 3,
            ],
            [
                'kartu_keluarga_id' => 4,
                'penduduk_id' => 4,
            ],
            [
                'kartu_keluarga_id' => 5,
                'penduduk_id' => 5,
            ],
        ];


        DB::table('kepala_keluarga')->insert(
            $data
        );
    }
}
