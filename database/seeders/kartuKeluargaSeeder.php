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

        $data = [
            [
                'rt_id' => 1,
                'NKK' => 3326160107400474,
                'no_telepon' => '085399275281',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 2,
                'NKK' => 3326166004030022,
                'no_telepon' => '081284123447',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 3,
                'NKK' => 3326161606790002,
                'no_telepon' => '082192013087',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 4,
                'NKK' => 3326160107400453,
                'no_telepon' => '085399275357',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 1,
                'NKK' => 3326166004030864,
                'no_telepon' => '081284123879',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 2,
                'NKK' => 3326161606790832,
                'no_telepon' => '082192013821',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 3,
                'NKK' => 3326160107400974,
                'no_telepon' => '085399275341',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 4,
                'NKK' => 3326166004030884,
                'no_telepon' => '081284123989',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 1,
                'NKK' => 3326161606790225,
                'no_telepon' => '082192013779',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rt_id' => 2,
                'NKK' => 3326161606790768,
                'no_telepon' => '082192013657',
                'tanggal_kk' => now(),
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ];


        DB::table('kartu_keluarga')->insert(
            $data
        );
    }
}
