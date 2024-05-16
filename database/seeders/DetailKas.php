<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data =[
                [
                    'id_kas' => 1,
                    'jumlah_kas' => 15000,
                ],
                [
                    'id_kas' => 2,
                    'jumlah_kas' => 15000,
                ],
                [
                    'id_kas' => 3,
                    'jumlah_kas' => 15000,
                ],
                [
                    'id_kas' => 4,
                    'jumlah_kas' => 15000,
                ],
                [
                    'id_kas' => 5,
                    'jumlah_kas' => 15000,
                ],
            ];
    
    
            DB::table('detail_kas')->insert(
                $data
            );

            
        }
        
    }
