<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanApiTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function test_can_get_all_kendaraan()
    {
        $kendaraan = Kendaraan::factory()->count(3)->create();

        $response = $this->get('/api/kendaraan');
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
