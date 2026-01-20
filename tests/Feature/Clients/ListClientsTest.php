<?php

namespace Tests\Feature\Clients;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListClientsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_clients()
    {
        Client::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/clients');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'links',
                'meta',
            ]);

        $this->assertCount(3, $response->json('data'));
    }
}
