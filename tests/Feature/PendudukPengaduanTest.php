<?php

namespace Tests\Feature;

use Tests\TestCase;

class PendudukPengaduanTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/pengaduan');

        $response->assertStatus(200);
    }

    public function test_pengaduan_create():void
    {
        $response = $this->get('/pengaduan/create');

        $response->assertStatus(200);
    }

    public function test_form_pengaduan():void
    {
        $data= [
            "NIK_pengaju" => '3510110101010004',
            "deskripsi_laporan" => 'test dummy from unit test'
        ];

        $response = $this->post('/pengaduan/create', $data);

        $response->assertStatus(302);

        $this->assertTrue(true);
    }
}
