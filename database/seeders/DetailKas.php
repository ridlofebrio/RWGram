<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_kas' => 1,
                'bulan' => 'januari',
                'jumlah_kas' => 15000,
                'tanggal_kas' => now(),
            ],
            [
                'id_kas' => 2,
                'bulan' => 'januari',
                'jumlah_kas' => 15000,
                'tanggal_kas' => now(),
            ],
            [
                'id_kas' => 3,
                'bulan' => 'januari',
                'jumlah_kas' => 15000,
                'tanggal_kas' => now(),
            ],


        ];


        DB::table('detail_kas')->insert(
            $data
        );
        DB::table('detail_kas')->insert(
            [
                'id_kas' => 4,
                'bulan' => 'januari',
                'jumlah_kas' => 15000,
                'tanggal_kas' => now(),
            ]
        );


    }

}
