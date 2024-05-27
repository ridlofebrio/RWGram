<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelayananStatusNikahTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/nikah-penduduk');

        $response->assertStatus(200);
    }

    public function test_nikahPenduduk_create(): void
    {
        $response = $this->get('/nikah-penduduk/create');

        $response->assertStatus(200);
    }

    public function test_form_nikahPenduduk(): void
    {
        $data =[
            'NIK_pengaju' => '3326160608070197',
            'NIK_pasangan' => '3510110101010005',
            'nama_pasangan' => 'Denny Sumargo',
            'status' => 'kawin',
        ];

        $response = $this->post('/nikah-penduduk/store');

        $response->assertStatus(302);
    }
}
