<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelayananStatusTinggalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/tinggal-penduduk');

        $response->assertStatus(200);
    }

    public function test_statusTinggal_create(): void
    {
        $response = $this->get('/tinggal-penduduk/create');

        $response->assertStatus(200);
    }

    public function test_form_statusTinggal(): void
    {
        $data = [
            'NIK' => '3326160608070197',
            'alamat_pindah' => 'DUmmy testing',
            'status' => 'tetap',
            // 'foto_bukti' => 'required',
        ];

        $response = $this->post('/tinggal-penduduk/store', $data);

        $response->assertStatus(302);
    }
}
