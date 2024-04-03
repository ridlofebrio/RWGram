<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $roles = array('RT Admin', 'RW Admin', 'Karang Taruna');
        $kode = array('RT1A','RT2A','RT3A', "RT4A",'RWA', 'KTR');
        $i = 1;
        $j=0;
        foreach ($kode as $kod) {
            if($i<=4){
                 DB::table('role')->insert(
                    [
                    'role_id' => $i,
                    'kode' => $kode[$i - 1],
                    'nama_role' => $roles[$j]
                    ]
                 )  ;  
                  
            }else{
                $j++;
                DB::table('role')->insert(
                    [
                        'role_id' => $i,
                        'kode' => $kode[$i - 1],
                        'nama_role' => $roles[$j]
                    ]
                );
            }
            $i++;  

           
         
        }
    }
}
