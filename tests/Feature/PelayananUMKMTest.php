<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PelayananUMKMTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/umkm-penduduk/index');

        $response->assertStatus(200);
    }

    public function test_umkm_create(): void
    {
        $response = $this->get('/umkm-penduduk/create');

        $response->assertStatus(200);
    }

    public function test_form_umkm(): void
    {
        $response = $this->get('/umkm-penduduk/create');

        $response->assertStatus(200);
    }
}
