<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RwSeeder::class,
            RtSeeder::class,
            kartuKeluargaSeeder::class,
            PendudukSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            Kas::class,
            PersuratanSeeder::class,
            LaporanSeeder::class,
            BansosSeeder::class,
            DetailKas::class,
            StatusHidupSeeder::class,
            StatusNikahSeeder::class,
            StatusTinggalSeeder::class,
            KepalaKeluargaSeeder::class,
            InformasiSeeder::class,
            UmkmSeeder::class,
            KriteriaSeeder::class,
            KasLogSeeder::class
        ]);
    }
}
