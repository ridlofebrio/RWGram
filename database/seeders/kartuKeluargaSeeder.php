<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory;
use Illuminate\Support\Facades\DB;



class kartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();
        DB::table('kartu_keluarga')->insert(
            [
                'rt_id' => 1,
                'NKK' => $faker->randomNumber(),
                'pendapatan' => 3000000,
                'no_telepon' => $faker->phoneNumber,
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ]
        );
    }
}
