<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusHidupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penduduk_id' => 2,
                'nama_pengaju' => 'Joe Bama',
                'NIK_pengaju' => '3326160902090003',
                'nama_meninggal' => 'Budi Santoso',
                'NIK_meninggal' => '3510110101010001',
                'foto_bukti' =>null,
            ],
            [
                'penduduk_id' => 3,
                'nama_pengaju' => 'Dewa Krisna',
                'NIK_pengaju' => '3326160105070023',
                'nama_meninggal' => 'Budi Santoso',
                'NIK_meninggal' => '3510110101010001',
                'foto_bukti' => null,
            ],
        ];
        DB::table('status_hidup')->insert($data);
    }
}
