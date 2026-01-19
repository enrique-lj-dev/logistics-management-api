<?php

namespace Tests\Feature\Shipments;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_shipment_for_a_client(): void
    {
        $client = Client::factory()->create();

        $payload = [
            'client_id' => $client->id,
            'origin_address' => 'Warehouse A',
            'destination_address' => 'Customer Address',
            'channel' => 'b2b',
        ];

        $response = $this->postJson('/api/v1/shipments', $payload);

        $response->assertStatus(201);

        $this->assertDatabaseHas('shipments', [
            'client_id' => $client->id,
        ]);
    }
}
