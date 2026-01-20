<?php

namespace Tests\Feature\Clients;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_a_client()
    {
        $client = Client::factory()->create();

        $response = $this->getJson("/api/v1/clients/{$client->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $client->id,
                    'name' => $client->name,
                ],
            ]);
    }

    public function test_returns_404_if_client_does_not_exist()
    {
        $response = $this->getJson('/api/v1/clients/999');

        $response->assertStatus(404);
    }
}
