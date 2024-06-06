<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTinggalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            'penduduk_id' => 1,
            'alamat_pindah' => 'Jl. Baru No. 5',
            'status' => 'kontrak',
            'foto_bukti' => null,
            'created_at' => now(),
            ],
            [
            'penduduk_id' => 2,
            'alamat_pindah' => 'Jl. Baru No. 10',
            'status' => 'tetap',
            'foto_bukti' => null,
            'created_at' => now(),
            ],
        ];

        DB::table('status_tinggal')->insert($data);
    }
}
