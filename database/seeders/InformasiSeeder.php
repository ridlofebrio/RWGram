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
                'user_id' => 2,
                'judul' => 'Buka Bersama',
                'deskripsi_informasi' => 'Buka bersama di rumah pak rt. Acara buka bersama ini diadakan untuk mempererat silaturahmi antar warga di lingkungan kita. Mari kita nikmati hidangan lezat sambil berbagi cerita dan kebahagiaan bersama. Semua warga diundang untuk ikut serta dalam acara ini. Jadwal acara adalah pada tanggal 25 April 2024 pukul 18.00 WIB di rumah Pak RT Budi, Jl. Lawang Barat.',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Rumah Pak RT Budi',
                'tanggal_informasi' => now()
            ],
            [
                'user_id' => 2,
                'judul' => 'Kerja Bakti',
                'deskripsi_informasi' => 'Kerja bakti lingkungan RW. Mari kita bergotong-royong untuk menjaga kebersihan dan keindahan lingkungan kita. Acara kerja bakti akan dilaksanakan pada hari Sabtu, tanggal 27 April 2024 pukul 08.00 WIB. Mari kita bersama-sama membersihkan selokan, trotoar, dan area publik lainnya agar lingkungan kita tetap bersih dan nyaman untuk semua warga.',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat',
                'tanggal_informasi' => now()
            ],
            [
                'user_id' => 2,
                'judul' => 'Senam Sehat',
                'deskripsi_informasi' => 'Senam sehat bugar bersama. Ayo jaga kesehatan tubuh kita dengan berpartisipasi dalam acara senam sehat bugar bersama. Acara ini akan dilaksanakan setiap hari Minggu pukul 06.00 WIB di Lapangan Tennis Warga, Jl. Lawang Barat. Dengan senam yang teratur, kita bisa menjaga tubuh tetap bugar dan sehat.',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Lapangan Tennis Warga',
                'tanggal_informasi' => now()
            ],
            [
                'user_id' => 2,
                'judul' => 'Posyandu',
                'deskripsi_informasi' => 'Posyandu adalah tempat untuk memeriksa kesehatan ibu dan anak secara berkala. Di Posyandu, kita dapat melakukan pemeriksaan kesehatan rutin, mendapatkan imunisasi, serta mendapatkan edukasi tentang kesehatan ibu dan anak. Mari datang dan manfaatkan layanan Posyandu untuk kesehatan keluarga kita. Jadwal Posyandu adalah setiap hari Kamis pukul 09.00 - 12.00 WIB di Lapangan Tennis Warga, Jl. Lawang Barat.',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Lapangan Tennis Warga',
                'tanggal_informasi' => now()
            ],
            [
                'user_id' => 2,
                'judul' => 'Halal Bi Halal',
                'deskripsi_informasi' => 'Halal bi halal merupakan tradisi silaturahmi yang dilakukan setelah lebaran. Acara ini adalah momentum untuk mempererat hubungan antarwarga serta meminta maaf atas segala kesalahan yang terjadi. Halal bi halal akan dilaksanakan pada tanggal 3 Mei 2024 pukul 10.00 WIB di Lapangan Tennis Warga, Jl. Lawang Barat. Mari kita sambut kedatangan bulan suci Syawal dengan penuh kebahagiaan dan kedamaian.',
                'foto_informasi' => '',
                'lokasi_informasi' => 'Jl. Lawang Barat Lapangan Tennis Warga',
                'tanggal_informasi' => now()
            ],
        ];
        
        DB::table('informasi')->insert($data);
    }
}
