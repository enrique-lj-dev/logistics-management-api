<?php

namespace Tests\Feature\Shipments;

use App\Models\Client;
use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListShipmentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_shipments()
    {
        $client = Client::factory()->create();
        Shipment::factory()->count(3)->create([
            'client_id' => $client->id,
        ]);

        $response = $this->getJson('/api/v1/shipments');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'links',
                'meta',
            ]);
    }
}
