<?php

namespace Tests\Feature\Clients;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateClientValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_name_is_required_when_creating_client(): void
    {
        $payload = [
            'type' => 'b2c',
            // 'name' => 'John Doe', falta a propósito
            'email' => 'john@example.com',
        ];

        $response = $this->postJson('/api/v1/clients', $payload);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors([
            'name',
        ]);
    }

    public function test_type_must_be_b2b_or_b2c(): void
    {
        $payload = [
            'type' => 'invalid',
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ];

        $response = $this->postJson('/api/v1/clients', $payload);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors([
            'type',
        ]);
    }
}