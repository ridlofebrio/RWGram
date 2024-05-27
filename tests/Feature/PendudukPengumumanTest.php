<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PendudukPengumumanTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_indexPage(): void
    {
        $response = $this->get('/informasi-penduduk/index');

        $response->assertStatus(200);
    }

    public function test_pengumuman_index(): void
    {
        $response = $this->get('/informasi-penduduk/show/1');

        $response->assertStatus(200);
    }
}
