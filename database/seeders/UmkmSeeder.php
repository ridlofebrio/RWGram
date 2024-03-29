<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 4; $i++) {
            DB::table('umkm')->insert([
                'umkm_id' => $i,
                'penduduk_id' => $i,
                'nama_umkm' => $faker->company(),
                'foto_umkm' => null,
                'link_medsos' => 'https://www.instagram.com/saonoke/',
                'deskripsi_umkm' => $faker->text(),
                'lokasi_umkm' => 'rumah denny',
                'tanggal_umkm' => now(),
                'created_at' => now()

            ]);
        }
    }
}
