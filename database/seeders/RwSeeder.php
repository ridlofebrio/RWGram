<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rw')->insert(
            [
                'rw_id' => 1,
                'nomor_rw' => '6',
                'kelurahan' => 'Kalirejo',
                'kecamatan' => 'Lawang',
            ],
            
        );
    }
}
