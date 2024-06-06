<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PendudukDataDiriTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/data-penduduk/request');

        $response->assertStatus(200);
    }

    public function test_dataDiri_show(): void
    {
        $data = [
            'nik' => '3510110101010004'
        ];

        $response = $this->post('/data-penduduk/show', $data);

        $response->assertStatus(200);
    }
}
