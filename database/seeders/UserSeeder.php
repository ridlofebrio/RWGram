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

        $faker = Factory::create();
        for ($i = 1; $i <= 3; $i++) {
            DB::table('user')->insert(
                [
                    'user_id' => $i,
                    'role_id' => $i,
                    'username' => $faker->userName,
                    'nama_user' => $faker->name,
                    'password' => Hash::make('password'),
                    'created_at' => now(),

                ]
            );
        }
    }
}
