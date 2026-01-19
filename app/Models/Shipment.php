<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Client;

class Shipment extends Model
{
    protected $fillable = [
        'reference',
        'client_id',
        'channel',
        'priority',
        'origin_address',
        'destination_address',
        'sla_date',
        'current_status',
    ];

    protected static function booted()
    {
        static::creating(function (Shipment $shipment) {
            if (empty($shipment->reference)) {
                $shipment->reference = 'SHP-' . Str::upper(Str::random(10));
            }

            if (empty($shipment->channel)) {
                $client = Client::find($shipment->client_id);
                $shipment->channel = $client->type; // b2b | b2c
            }

            if (empty($shipment->current_status)) {
                $shipment->current_status = 'created';
            }
        });
    }
}