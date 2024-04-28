<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusNikahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penduduk_id' => 1,
                'nama_pengaju' => 'Febrio',
                'NIK_pengaju' => '3326160608070197',
                'nama_pasangan' => 'Anya Geraldine',
                'NIK_pasangan' => '3510110101010002',
                'status' => 'kawin',
                'created_at' => now(),
                'foto_bukti' => null,
            ],
            [
                'penduduk_id' => 2,
                'nama_pengaju' => 'JO Bama',
                'NIK_pengaju' => '3326160902090003',
                'nama_pasangan' => 'Mas Bambang',
                'NIK_pasangan' => '3510110101010002',
                'status' => 'cerai',
                'created_at' => now(),
                'foto_bukti' => null,
            ],
        ];

        DB::table('status_nikah')->insert($data);
    }
}
