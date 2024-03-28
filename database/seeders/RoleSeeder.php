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
        $kode = array('RTA', 'RWA', 'KTR');
        $i = 1;
        foreach ($roles as $role) {
            DB::table('role')->insert(
                [
                    'role_id' => $i,
                    'kode' => $kode[$i - 1],
                    'nama_role' => $role
                ]
            );
            $i++;
        }
    }
}
