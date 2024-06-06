<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
use Faker\Factory;

class PersuratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'persuratan_id' => 1,
                'penduduk_id' => 3,
                'nomor_surat' => '09.001/RW06/VI/2024',
                'keterangan' => 'Permohonan Surat Keterangan Tidak Mampu (SKTM) untuk keperluan biaya kuliah',
                'tanggal_persuratan' => '2024-04-10',
                'created_at' => now()
            ],
            [
                'persuratan_id' => 2,
                'penduduk_id' => 2,
                'nomor_surat' => '09.002/RW06/VI/2024',
                'keterangan' => 'Permohonan Surat Keterangan Domisili untuk keperluan administrasi pekerjaan',
                'tanggal_persuratan' => '2024-03-25',
                'created_at' => now()
            ],
            [
                'persuratan_id' => 3,
                'penduduk_id' => 4,
                'nomor_surat' => '09.003/RW06/VI/2024',
                'keterangan' => 'Permohonan Surat Keterangan Usaha untuk keperluan pembukaan rekening bank',
                'tanggal_persuratan' => '2024-04-05',
                'created_at' => now()
            ],
            [
                'persuratan_id' => 4,
                'penduduk_id' => 5,
                'nomor_surat' => '09.004/RW06/VI/2024',
                'keterangan' => 'Permohonan Surat Keterangan Beasiswa untuk keperluan pendaftaran program studi',
                'tanggal_persuratan' => '2024-03-15',
                'created_at' => now()
            ],
            [
                'persuratan_id' => 5,
                'penduduk_id' => 1,
                'nomor_surat' => '09.005/RW06/VI/2024',
                'keterangan' => 'Permohonan Surat Keterangan Kelahiran untuk keperluan administrasi kependudukan',
                'tanggal_persuratan' => '2024-04-20',
                'created_at' => now()
            ],
        ];


        DB::table('persuratan')->insert(
            $data
        );
    }
}
