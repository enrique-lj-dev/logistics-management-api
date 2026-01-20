<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'channel' => $this->faker->randomElement(['b2b', 'b2c']),
            'priority' => $this->faker->randomElement(['low', 'normal', 'high']),
            'origin_address' => $this->faker->address(),
            'destination_address' => $this->faker->address(),
            'current_status' => 'created',
            'sla_date' => now()->addDays(3),
        ];
    }
}
