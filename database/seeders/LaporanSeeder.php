<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'laporan_id' => 1,
                'penduduk_id' => 1,
                'deskripsi_laporan' => 'Saya ingin melaporkan tentang masalah sanitasi di lingkungan kami. Beberapa hari terakhir, kami telah mengalami masalah dengan saluran air yang tersumbat di sekitar rumah kami. Hal ini menyebabkan air kotor dan limbah tersumbat di depan rumah kami, menciptakan bau yang tidak sedap dan lingkungan yang tidak sehat. Kami sangat berharap masalah ini bisa segera ditangani oleh pihak yang berwenang. Kami juga membutuhkan perbaikan lampu jalan di sekitar wilayah kami, karena beberapa lampu sudah mati dan membuat malam hari menjadi gelap dan tidak aman bagi kami yang harus pulang larut malam. Terima kasih atas perhatiannya.',
                'status_laporan' => 'menunggu',
                'foto_laporan' => null,
                'tanggal_laporan' => now(),
                'created_at' => now()
            ],
            [
                'laporan_id' => 2,
                'penduduk_id' => 2,
                'deskripsi_laporan' => 'Saya ingin melaporkan adanya masalah dengan fasilitas kesehatan di lingkungan kami. Rumah sakit terdekat sudah tidak mampu menampung jumlah pasien yang semakin meningkat, menyebabkan antrian panjang dan pelayanan yang kurang optimal. Selain itu, kami juga mengalami kesulitan dalam mendapatkan obat-obatan dan perawatan medis yang diperlukan. Kami membutuhkan perhatian dan solusi dari pemerintah terkait masalah ini agar masyarakat bisa mendapatkan pelayanan kesehatan yang memadai dan terjangkau. Terima kasih.',
                'status_laporan' => 'menunggu',
                'foto_laporan' => null,
                'tanggal_laporan' => now(),
                'created_at' => now()
            ],
            [
                'laporan_id' => 3,
                'penduduk_id' => 3,
                'deskripsi_laporan' => 'Saya ingin melaporkan tentang keamanan di lingkungan kami yang semakin memprihatinkan. Beberapa minggu terakhir, kami sering mendengar tentang kasus pencurian dan tindak kriminal lainnya yang terjadi di sekitar kami. Kami merasa khawatir akan keselamatan kami dan keluarga kami. Kami membutuhkan peningkatan patroli keamanan dan peningkatan sinar lampu jalan di sekitar wilayah kami untuk mencegah tindak kriminal tersebut. Kami harap pihak berwenang segera mengambil tindakan untuk meningkatkan keamanan lingkungan kami. Terima kasih.',
                'status_laporan' => 'menunggu',
                'foto_laporan' => null,
                'tanggal_laporan' => now(),
                'created_at' => now()
            ],
            [
                'laporan_id' => 4,
                'penduduk_id' => 4,
                'deskripsi_laporan' => 'Saya ingin melaporkan tentang masalah transportasi publik di wilayah kami yang semakin buruk. Kami sering mengalami keterlambatan dan ketidakpastian dalam jadwal transportasi publik yang ada. Hal ini menyulitkan kami untuk bekerja dan beraktivitas sehari-hari. Selain itu, kondisi armada transportasi yang sudah tua dan kurang terawat juga menyebabkan ketidaknyamanan dan risiko keselamatan bagi penumpang. Kami berharap pihak terkait bisa segera melakukan perbaikan dan peningkatan dalam sistem transportasi publik di wilayah kami. Terima kasih.',
                'status_laporan' => 'menunggu',
                'foto_laporan' => null,
                'tanggal_laporan' => now(),
                'created_at' => now()
            ],
            [
                'laporan_id' => 5,
                'penduduk_id' => 5,
                'deskripsi_laporan' => 'Saya ingin melaporkan tentang masalah kebersihan di lingkungan kami. Beberapa kali kami melihat sampah berserakan di sekitar tempat pembuangan sampah yang sudah penuh. Hal ini menyebabkan bau tidak sedap dan menarik penyebaran hama serta penyakit. Kami juga menemukan banyak jalan yang tidak bersih dan terdapat genangan air yang menjadi sarang nyamuk. Kami berharap pihak terkait segera melakukan tindakan untuk membersihkan lingkungan kami dan mengatasi masalah ini. Terima kasih atas perhatiannya.',
                'status_laporan' => 'menunggu',
                'foto_laporan' => null,
                'tanggal_laporan' => now(),
                'created_at' => now()
            ],
        ];


        DB::table('laporan')->insert(
            $data
        );
    }
}
