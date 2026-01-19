<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShipmentRequest;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    public function store(CreateShipmentRequest $request)
    {
        $shipment = Shipment::create($request->validated());

        return response()->json([
            'data' => $shipment,
        ], 201);
    }
}
