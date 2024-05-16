<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 30; $i++) { 
            $data =[
                [
                    'kartu_keluarga_id' => 1,
                    'jumlah_kas' => 15000,
                    'bulan_membayar' => $i,
                    'tanggal_kas' => now()
                ],
                [
                    'kartu_keluarga_id' => 2,
                    'jumlah_kas' => 15000,
                    'bulan_membayar' => $i,
                    'tanggal_kas' => now()
                ],
                [
                    'kartu_keluarga_id' => 3,
                    'jumlah_kas' => 15000,
                    'bulan_membayar' => $i,
                    'tanggal_kas' => now()
                ],
                [
                    'kartu_keluarga_id' => 4,
                    'jumlah_kas' => 15000,
                    'bulan_membayar' => $i,
                    'tanggal_kas' => now()
                ],
                [
                    'kartu_keluarga_id' => 5,
                    'jumlah_kas' => 15000,
                    'bulan_membayar' => $i,
                    'tanggal_kas' => now()
                ],
            ];
    
    
            DB::table('kas')->insert(
                $data
            );

            
        }
        
    }
}
