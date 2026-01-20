<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'client_id' => $this->client_id,
            'channel' => $this->channel,
            'priority' => $this->priority,
            'origin_address' => $this->origin_address,
            'destination_address' => $this->destination_address,
            'current_status' => $this->current_status,
            'sla_date' => $this->sla_date,
            'created_at' => $this->created_at,
        ];
    }
}
