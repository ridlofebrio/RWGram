<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();

        for ($i = 1; $i <= 5; $i++) {

            DB::table('penduduk')->insert(
                [
                    "penduduk_id" => $i,
                    'kartu_keluarga_id' => 1,
                    'NIK' => $faker->randomNumber(),
                    'nama_penduduk' => $faker->name(),
                    'tanggal_lahir' => $faker->date(),
                    'status_perkawinan' => $faker->boolean(),
                    'jenis_kelamin' => $faker->randomElement($array = array('L', 'P')),
                    'alamat' => $faker->streetAddress,
                    'agama' => 'islam',
                    'pekerjaan' => $faker->jobTitle,
                    'status_tinggal' => 'tetap',
                    'status_kematian' => false,
                ]
            );

        }
    }
}
