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
        // Define data source
        $keluhan = [
            "Masalah sanitasi di lingkungan",
            "Kerusakan infrastruktur jalan",
            "Kekurangan fasilitas pendidikan",
            "Ketidaknyamanan lingkungan akibat sampah",
            "Kualitas air minum yang buruk",
            "Tingkat kejahatan yang meningkat",
            "Kerusakan saluran air",
            "Ketidakamanan transportasi umum",
            "Ketidakmampuan layanan kesehatan",
            "Kerusakan fasilitas umum",
            "Kerusakan listrik di wilayah",
            "Kebisingan dari industri di sekitar",
            "Ketidakstabilan harga kebutuhan pokok",
            "Ketidakmampuan akses internet yang baik",
            "Ketidakmampuan pengelolaan sampah",
            "Masalah polusi udara",
            "Kurangnya penerangan jalan di malam hari",
            "Kemacetan lalu lintas",
            "Kurangnya ruang hijau dan taman",
            "Kualitas udara yang buruk",
            "Kurangnya fasilitas olahraga",
            "Kurangnya aksesibilitas untuk penyandang disabilitas",
            "Banjir saat musim hujan",
            "Kurangnya tempat parkir umum",
            "Masalah pengelolaan limbah industri",
            "Kurangnya pusat kegiatan masyarakat",
            "Kualitas jalan yang buruk",
            "Kurangnya pos keamanan lingkungan",
            "Masalah keberlanjutan lingkungan",
            "Masalah dengan kebisingan kendaraan",
            "Kurangnya fasilitas untuk anak-anak",
            "Kurangnya perawatan taman kota",
            "Masalah kebersihan di pasar tradisional",
            "Kerusakan jembatan",
            "Kekurangan pasokan air bersih",
            "Masalah dengan binatang liar",
            "Kurangnya tempat penampungan hewan",
            "Pengelolaan bencana yang tidak memadai",
            "Masalah dengan lalu lintas berat",
            "Kurangnya program kesehatan masyarakat",
            "Kurangnya fasilitas untuk lansia",
            "Masalah dengan kualitas udara dalam ruangan",
            "Kurangnya fasilitas daur ulang",
            "Masalah dengan vandalisme",
            "Kurangnya pengawasan lingkungan",
            "Masalah dengan drainase air hujan",
            "Kurangnya penerangan di fasilitas umum",
            "Masalah dengan akses ke perawatan kesehatan mental",
            "Kurangnya pengelolaan hutan kota",
            "Masalah dengan serangga dan hama",
            "Kurangnya program pendidikan lingkungan",
            "Masalah dengan layanan darurat",
            "Kurangnya tempat rekreasi",
            "Masalah dengan infrastruktur air limbah",
            "Kurangnya fasilitas seni dan budaya",
            "Masalah dengan keamanan cyber",
            "Kurangnya pengelolaan lalu lintas sepeda",
            "Masalah dengan penyediaan air minum",
            "Kurangnya fasilitas kebugaran",
            "Masalah dengan jaringan listrik",
            "Kurangnya perlindungan terhadap polusi suara",
            "Masalah dengan pemeliharaan bangunan bersejarah",
            "Kurangnya fasilitas transportasi publik",
            "Masalah dengan kualitas makanan di pasar",
            "Kurangnya pusat bantuan hukum",
            "Masalah dengan layanan telekomunikasi",
            "Kurangnya program beasiswa pendidikan",
            "Masalah dengan penyediaan energi terbarukan",
            "Kurangnya fasilitas sanitasi di sekolah"
        ];

        $status = ["menunggu", "proses", "selesai", "ditolak"];

        // Generate 100 reports
        for ($i = 0; $i < 100; $i++) {
            $pendudukId = rand(1, 10); // Assuming you have 10 penduduk records
            $deskripsiLaporan = $keluhan[array_rand($keluhan)];
            $statusLaporan = $status[array_rand($status)];
            $tanggalLaporan = date('Y-m-d H:i:s', mt_rand(strtotime('2024-01-01'), strtotime('2024-12-31')));

            // Insert report data into database
            DB::table('laporan')->insert([
                'penduduk_id' => $pendudukId,
                'deskripsi_laporan' => $deskripsiLaporan,
                'status_laporan' => $statusLaporan,
                'tanggal_laporan' => $tanggalLaporan,
            ]);
        }
    }
}
