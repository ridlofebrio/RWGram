<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = range(2024, 2100);
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        foreach ($years as $year) {
            foreach ($months as $month) {
                DB::table('waktu')->insert([
                    'tahun' => $year,
                    'bulan' => $month,
                ]);
            }
        }
    }
}
