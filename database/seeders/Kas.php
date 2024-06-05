<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kartu_keluarga_id' => 1,
                'tahun' => 2024,
                'Januari' => true
            ],
            [
                'kartu_keluarga_id' => 2,
                'tahun' => 2024,
                'Januari' => true
            ],
            [
                'kartu_keluarga_id' => 3,

                'tahun' => 2024,
                'Januari' => true
            ],


        ];
        DB::table('kas')->insert(
            $data
        );
        DB::table('kas')->insert(
            [
                'user_id' => 3,

                'tahun' => 2024,
                'Januari' => true

            ]
        );


        DB::table('kas')->insert(
            [

                [
                    'user_id' => 4,

                    'tahun' => 2024,

                ],
                [
                    'user_id' => 5,

                    'tahun' => 2024,

                ],
                [
                    'user_id' => 6,

                    'tahun' => 2024,
                ]
            ]
        );
    }
}
