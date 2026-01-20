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

    public function index()
    {
        $shipments = Shipment::paginate(10);

        return response()->json([
            'data' => $shipments->items(),
            'links' => [
                'first' => $shipments->url(1),
                'last' => $shipments->url($shipments->lastPage()),
                'prev' => $shipments->previousPageUrl(),
                'next' => $shipments->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $shipments->currentPage(),
                'from' => $shipments->firstItem(),
                'last_page' => $shipments->lastPage(),
                'per_page' => $shipments->perPage(),
                'to' => $shipments->lastItem(),
                'total' => $shipments->total(),
            ],
        ]);
    }
}
