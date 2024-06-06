<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'user_id' => 1,
                'role_id' => 5,
                'username' => 'RWLawang',
                'nama_user' => 'Hasibuan',

                'password' => Hash::make('rw'),
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'role_id' => 6,
                'username' => 'KTLawang',
                'nama_user' => 'Karang Taruna',
                'password' => Hash::make('kt'),

                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'role_id' => 1,
                'username' => 'RT1',
                'nama_user' => 'RT 01',
                'password' => Hash::make('rt1'),

                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'role_id' => 4,
                'username' => 'RT4',
                'nama_user' => 'RT 04',
                'password' => Hash::make('rt4'),

                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'role_id' => 2,
                'username' => 'RT2',
                'nama_user' => 'RT 02',
                'password' => Hash::make('rt2'),

                'created_at' => now(),
            ],
            [
                'user_id' => 6,
                'role_id' => 3,
                'username' => 'RT3',
                'nama_user' => 'RT 03',
                'password' => Hash::make('rt3'),

                'created_at' => now(),
            ]
        ];



        DB::table('user')->insert(
            $data
        );

    }
}
