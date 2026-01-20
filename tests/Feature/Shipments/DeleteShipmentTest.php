<?php

namespace Tests\Feature\Shipments;

use App\Models\Client;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_delete_a_shipment()
    {
        $client = Client::factory()->create();
        $shipment = Shipment::factory()->create([
            'client_id' => $client->id,
        ]);

        $response = $this->deleteJson(
            "/api/v1/shipments/{$shipment->id}"
        );

        $response->assertStatus(204);

        $this->assertDatabaseMissing('shipments', [
            'id' => $shipment->id,
        ]);
    }
}
