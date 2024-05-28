<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelayananStatusHidupTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/hidup-penduduk');

        $response->assertStatus(200);
    }

    public function test_statusHidup_create(): void
    {
        $response = $this->get('/hidup-penduduk/create');

        $response->assertStatus(200);
    }

    public function test_form_statusHidup(): void
    {   
        $data =[
            'NIK_pengaju' => '3326160608070197',
            'NIK_meninggal' => '3326160608070197',
        ];

        $response = $this->post('/hidup-penduduk/store', $data);

        $response->assertStatus(302);
    }
}
