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
                'id_penduduk_meninggal' => 1,
                'foto_bukti' =>null,
                'created_at' => now(),
            ],
            [
                'penduduk_id' => 3,
                'id_penduduk_meninggal' => 2, 
                'foto_bukti' => null,
                'created_at' => now(),
            ],
        ];
        DB::table('status_hidup')->insert($data);
    }
}
