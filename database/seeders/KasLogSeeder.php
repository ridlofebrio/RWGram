<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kas_log')->insert([
            [
                'user_id' => 1,
                'jumlah' => 100000,
                'status_kas_log' => true,
                'keterangan_kas_log' => 'Pemasukan awal'
            ],
            [
                'user_id' => 2,
                'jumlah' => 50000,
                'status_kas_log' => false,
                'keterangan_kas_log' => 'Pengeluaran untuk bahan bangunan'
            ],
            [
                'user_id' => 3,
                'jumlah' => 40000,
                'status_kas_log' => false,
                'keterangan_kas_log' => 'Pengeluaran untuk kerja bakti Minggu'
            ],
            [
                'user_id' => 3,
                'jumlah' => 50000,
                'status_kas_log' => true,
                'keterangan_kas_log' => 'Pemasukan bulan februari'
            ],

        ]);
    }
}
