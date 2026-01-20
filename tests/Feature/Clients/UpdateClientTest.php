<?php

namespace Tests\Feature\Clients;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_update_a_client()
    {
        $client = Client::factory()->create();

        $payload = [
            'name' => 'Updated Name',
            'address' => 'New Address',
        ];

        $response = $this->putJson("/api/v1/clients/{$client->id}", $payload);

        $response->assertStatus(200);

        $this->assertDatabaseHas('clients', [
            'id' => $client->id,
            'name' => 'Updated Name',
            'address' => 'New Address',
        ]);
    }
}
