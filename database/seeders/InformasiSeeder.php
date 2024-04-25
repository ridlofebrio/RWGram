<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'judul' => 'Buka Bersama',
                'deskripsi_informasi' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Rumah Pak RT Budi',
                'tanggal_informasi' => now(),
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'judul' => 'Kerja Bakti',
                'deskripsi_informasi' => 'Kerja bakti lingkungan RW',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat',
                'tanggal_informasi' => now(),
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'judul' => 'Senam Sehat',
                'deskripsi_informasi' => 'Senam sehat bugar bersama',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Lapangan Tennis Warga',
                'tanggal_informasi' => now(),
                'created_at' => now()
            ],

        ];
        DB::table('informasi')->insert($data);
    }
}
