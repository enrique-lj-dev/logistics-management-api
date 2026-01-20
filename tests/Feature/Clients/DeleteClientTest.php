<?php

namespace Tests\Feature\Clients;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_delete_a_client()
    {
        $client = Client::factory()->create();

        $response = $this->deleteJson("/api/v1/clients/{$client->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('clients', [
            'id' => $client->id,
        ]);
    }
}
