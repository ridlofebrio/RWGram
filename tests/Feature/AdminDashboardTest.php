<?php

namespace Tests\Feature;

use App\Models\PendudukModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_useLogin_Success(): void
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_userLogin_Failed()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_pengajuan_index()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/dashboard/pengajuan');

        $response->assertStatus(200);
    }

    public function test_pengajuan_update()
    {
        $user = User::find(1);
        $data = [
            'status_laporan' => 'Selesai'
        ];

        $response = $this->actingAs($user)->put('/konfirmasi/pengaduan/1', $data);

        $response->assertStatus(302);
    }

    public function test_penduduk_index()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/dashboard/penduduk');

        $response->assertStatus(200);
    }

    public function test_penduduk_create()
    {
        $data = [
            'NKK' => '3326160107400474',
            'kartu_keluarga_id' => 1,
            'NIK' => '3326165507405574',
            'nama' => 'Budi Santoso',
            'tempat_lahir' => 'Lawang',
            'tanggal_lahir' => '1995-08-15',
            'jenis_kelamin' => 'P',
            'golongan_darah' => 'ab',
            'agama' => 'Islam',
            'alamat' => 'Samping Rumah Denny',
            'status_kawin' => 'belum kawin',
            'pekerjaan' => 'President',
            'status_tinggal' => 'tetap',
            'status_meninggal' => 0

        ];

        $response = $this->post('/penduduk', $data);

        $response->assertStatus(302);
    }

    public function test_penduduk_delete()
    {
        $penduduk = PendudukModel::where('NIK', '3326165507405574')->first();
        $response = $this->delete('/penduduk/'.$penduduk->penduduk_id);

        $response->assertStatus(302);
    }
}
