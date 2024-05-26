<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kriteria_id' => 1,
                'nama_kriteria' => 'Total Pendapatan',
                'bobot' => 0.25,
                'attribut' => 'cost',
            ],
            [
                'kriteria_id' => 2,
                'nama_kriteria' => 'Jumlah Tanggungan',
                'bobot' => 0.25,
                'attribut' => 'benefit',
            ],
            [
                'kriteria_id' => 3,
                'nama_kriteria' => 'Luas Rumah',
                'bobot' => 0.15,
                'attribut' => 'cost',
            ],
            [
                'kriteria_id' => 4,
                'nama_kriteria' => 'Luas Tanah',
                'bobot' => 0.15,
                'attribut' => 'cost',
            ],
            [
                'kriteria_id' => 5,
                'nama_kriteria' => 'Jumlah Kendaraan',
                'bobot' => 0.1,
                'attribut' => 'cost',
            ],
            [
                'kriteria_id' => 6,
                'nama_kriteria' => 'Jumlah Watt',
                'bobot' => 0.1,
                'attribut' => 'cost',
            ],
        ];

        DB::table('kriterias')->insert($data);
    }
}
