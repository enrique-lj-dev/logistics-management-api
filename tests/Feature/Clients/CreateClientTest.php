<?php

namespace Tests\Feature\Clients;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_b2c_client(): void
    {
        $payload = [
            'type' => 'b2c',
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'phone' => '+34123456789',
            'address' => 'Calle Mayor 1, Madrid',
        ];

        $response = $this->postJson('/api/v1/clients', $payload);

        $response->assertStatus(201);

        $response->assertJson([
            'data' => [
                'type' => 'b2c',
                'name' => 'Juan Pérez',
                'email' => 'juan@example.com',
            ],
        ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'Juan Pérez',
            'type' => 'b2c',
        ]);
    }
}
