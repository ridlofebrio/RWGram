<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'judul' => 'Buka Bersama',
                'deskrisi_informasi' => 'Buka bersama di rumah pak rt',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Rumah Pak RT Budi',
                'tanggal_informasi' => now()
            ],
            [
                'user_id' => 1,
                'judul' => 'Kerja Bakti',
                'deskrisi_informasi' => 'Kerja bakti lingkungan RW',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat',
                'tanggal_informasi' => now()
            ],
            [
                'user_id' => 1,
                'judul' => 'Senam Sehat',
                'deskrisi_informasi' => 'Senam sehat bugar bersama',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Lapangan Tennis Warga',
                'tanggal_informasi' => now()
            ],

        ];
        DB::table('informasi')->insert($data);
    }
}
