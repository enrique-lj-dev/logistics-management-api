<?php

namespace Tests\Feature\Shipments;

use App\Models\Client;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_update_a_shipment()
    {
        $client = Client::factory()->create();
        $shipment = Shipment::factory()->create([
            'client_id' => $client->id,
        ]);

        $payload = [
            'origin_address' => 'New origin',
            'destination_address' => 'New destination',
        ];

        $response = $this->putJson(
            "/api/v1/shipments/{$shipment->id}",
            $payload
        );

        $response->assertStatus(200);

        $this->assertDatabaseHas('shipments', [
            'id' => $shipment->id,
            'origin_address' => 'New origin',
        ]);
    }
}
