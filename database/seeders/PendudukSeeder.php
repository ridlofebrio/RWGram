<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                "penduduk_id" => 1,
                'kartu_keluarga_id' => 1,
                'NIK' => 3326160608070197,
                'nama_penduduk' => 'Febrio',
                'tanggal_lahir' => '1995-08-15',
                'status_perkawinan' => 'belum kawin',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Merdeka No. 10',
                'golongan_darah' => 'AB',
                'tempat_lahir' => 'Banyuwangi',
                'agama' => 'Islam',
                'pekerjaan' => 'Wiraswasta',
                'status_tinggal' => 'tetap',
                'status_kematian' => false,
            ],
            [
                "penduduk_id" => 2,
                'kartu_keluarga_id' => 1,
                'NIK' => 3326160902090003,
                'nama_penduduk' => 'JO Bama',
                'tanggal_lahir' => '1990-04-25',
                'status_perkawinan' => 'kawin',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Pahlawan No. 5',
                'golongan_darah' => 'O',
                'tempat_lahir' => 'Bekasi',
                'agama' => 'Kristen',
                'pekerjaan' => 'PNS',
                'status_tinggal' => 'tetap',
                'status_kematian' => false,
            ],
            [
                "penduduk_id" => 3,
                'kartu_keluarga_id' => 2,
                'NIK' => 3326160105070023,
                'nama_penduduk' => 'Dewa Krisna',
                'tanggal_lahir' => '1982-11-10',
                'status_perkawinan' => 'cerai',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Surya No. 8',
                'golongan_darah' => 'A',
                'tempat_lahir' => 'Mojokerto',
                'agama' => 'Hindu',
                'pekerjaan' => 'Guru',
                'status_tinggal' => 'tetap',
                'status_kematian' => false,
            ],
            [
                "penduduk_id" => 4,
                'kartu_keluarga_id' => 2,
                'NIK' => 3510110101010004,
                'nama_penduduk' => 'Byan Fans MU',
                'tanggal_lahir' => '1978-03-20',
                'status_perkawinan' => 'kawin',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Diponegoro No. 15',
                'golongan_darah' => 'B',
                'tempat_lahir' => 'Bogor',
                'agama' => 'Islam',
                'pekerjaan' => 'Dokter',
                'status_tinggal' => 'tetap',
                'status_kematian' => false,
            ],
            [
                "penduduk_id" => 5,
                'kartu_keluarga_id' => 3,
                'NIK' => 3510110101010005,
                'nama_penduduk' => 'Denny Sumargo',
                'tanggal_lahir' => '2000-12-30',
                'status_perkawinan' => 'belum kawin',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Gatot Subroto No. 20',
                'golongan_darah' => 'AB',
                'tempat_lahir' => 'Malang',
                'agama' => 'Islam',
                'pekerjaan' => 'Mahasiswa',
                'status_tinggal' => 'tetap',
                'status_kematian' => false,
            ],
        ];
        




            DB::table('penduduk')->insert(
               $data
            );
        
    }
}
