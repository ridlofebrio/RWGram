<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 4; $i++) {
            DB::table('rt')->insert(
                [
                    'rt_id' => $i,
                    'rw_id' => 1,
                    'nomor_rt' => $i,
                ]
            );
        }


    }
}
