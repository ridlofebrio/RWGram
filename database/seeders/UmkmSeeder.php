<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'umkm_id' => 1,
                'penduduk_id' => 1,
                'nama_umkm' => 'Sambel Bakar',

                'no_wa' => '081210293647',
                'link_medsos' => 'https://www.instagram.com/sambel_bakar/',
                'nama_medsos' => '@sambalbakariben',
                'deskripsi_umkm' => 'Sambel Bakar menyajikan masakan khas Indonesia dengan rasa pedas yang lezat. Terbuat dari bahan-bahan segar dan rempah pilihan, Sambel Bakar siap memanjakan lidah Anda dengan cita rasa yang autentik. Nikmati sensasi pedasnya yang menggugah selera di setiap gigitannya!',
                'lokasi_umkm' => 'Jl. Merdeka No. 123',
                'tanggal_umkm' => '2024-04-23',
                'status_pengajuan' => 'diterima',
                'created_at' => now(),
            ],
            [
                'umkm_id' => 2,
                'penduduk_id' => 2,
                'nama_umkm' => 'Warung Makan Padang',

                'no_wa' => '081210293521',
                'link_medsos' => 'https://www.instagram.com/warung_padang/',
                'nama_medsos' => '@warungpadangmurah',
                'deskripsi_umkm' => 'Warung Makan Padang menyajikan aneka masakan Padang dengan cita rasa yang otentik dan khas. Dari rendang, gulai ayam, sambal lado hijau, hingga gulai daun singkong, semua hidangan kami dibuat dengan bumbu rempah tradisional yang membuatnya lezat dan menggugah selera. Kunjungi kami sekarang dan rasakan nikmatnya masakan Padang!',
                'lokasi_umkm' => 'Jl. Sudirman No. 45',
                'tanggal_umkm' => '2024-04-20',
                'status_pengajuan' => 'diterima',
                'created_at' => now(),
            ],
            [
                'umkm_id' => 3,
                'penduduk_id' => 3,
                'nama_umkm' => 'Bakso Pak Kress',

                'no_wa' => '081210296487',
                'link_medsos' => 'https://www.instagram.com/bakso/',
                'nama_medsos' => '@baksoenak',
                'deskripsi_umkm' => 'Bakso Pak Man menyajikan bakso dengan cita rasa yang autentik dan kenyal. Dibuat dari daging sapi pilihan yang diolah dengan resep turun-temurun, setiap suapan bakso akan memberikan pengalaman rasa yang tiada duanya. Jangan lewatkan sensasi kenikmatan bakso kami yang bikin ketagihan!',
                'lokasi_umkm' => 'Jl. Ahmad Yani No. 67',
                'tanggal_umkm' => '2024-04-18',
                'status_pengajuan' => 'diterima',
                'created_at' => now()
            ],
            [
                'umkm_id' => 4,
                'penduduk_id' => 1,
                'nama_umkm' => 'Sambel Bakar',

                'no_wa' => '081210293647',
                'link_medsos' => 'https://www.instagram.com/sambel_bakar/',
                'nama_medsos' => '@sambalbakariben',
                'deskripsi_umkm' => 'Sambel Bakar menyajikan masakan khas Indonesia dengan rasa pedas yang lezat. Terbuat dari bahan-bahan segar dan rempah pilihan, Sambel Bakar siap memanjakan lidah Anda dengan cita rasa yang autentik. Nikmati sensasi pedasnya yang menggugah selera di setiap gigitannya!',
                'lokasi_umkm' => 'Jl. Merdeka No. 123',
                'tanggal_umkm' => '2024-04-23',
                'status_pengajuan' => 'menunggu',
                'created_at' => now()
            ],
            [
                'umkm_id' => 5,
                'penduduk_id' => 2,
                'nama_umkm' => 'Warung Makan Padang',

                'no_wa' => '081210293521',
                'link_medsos' => 'https://www.instagram.com/warung_padang/',
                'nama_medsos' => '@warungpadangmurah',
                'deskripsi_umkm' => 'Warung Makan Padang menyajikan aneka masakan Padang dengan cita rasa yang otentik dan khas. Dari rendang, gulai ayam, sambal lado hijau, hingga gulai daun singkong, semua hidangan kami dibuat dengan bumbu rempah tradisional yang membuatnya lezat dan menggugah selera. Kunjungi kami sekarang dan rasakan nikmatnya masakan Padang!',
                'lokasi_umkm' => 'Jl. Sudirman No. 45',
                'tanggal_umkm' => '2024-04-20',
                'status_pengajuan' => 'menunggu',
                'created_at' => now()
            ],
            [
                'umkm_id' => 6,
                'penduduk_id' => 3,
                'nama_umkm' => 'Bakso Pak Kress',

                'no_wa' => '081210296487',
                'link_medsos' => 'https://www.instagram.com/bakso/',
                'nama_medsos' => '@baksoenak',
                'deskripsi_umkm' => 'Bakso Pak Man menyajikan bakso dengan cita rasa yang autentik dan kenyal. Dibuat dari daging sapi pilihan yang diolah dengan resep turun-temurun, setiap suapan bakso akan memberikan pengalaman rasa yang tiada duanya. Jangan lewatkan sensasi kenikmatan bakso kami yang bikin ketagihan!',
                'lokasi_umkm' => 'Jl. Ahmad Yani No. 67',
                'tanggal_umkm' => '2024-04-18',
                'status_pengajuan' => 'menunggu',
                'created_at' => now(),
            ],
        ];
        DB::table('umkm')->insert($data);
    }
}
