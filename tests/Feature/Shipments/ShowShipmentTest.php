<?php

namespace Tests\Feature\Shipments;

use App\Models\Client;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_a_shipment()
    {
        $client = Client::factory()->create();
        $shipment = Shipment::factory()->create([
            'client_id' => $client->id,
        ]);

        $response = $this->getJson("/api/v1/shipments/{$shipment->id}");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'reference',
                    'client_id',
                ],
            ]);
    }
}
