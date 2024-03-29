<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
use Faker\Factory;

class PersuratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 3; $i++) {
            DB::table('persuratan')->insert(
                [
                    'persuratan_id' => $i,
                    'penduduk_id' => 3,
                    'nomor_surat' => $faker->randomNumber(),
                    'keterangan' => 'Untuk KIP kuliah',
                    'tanggal_persuratan' => now(),
                    'created_at' => now()
                ]
            );
        }
    }
}
