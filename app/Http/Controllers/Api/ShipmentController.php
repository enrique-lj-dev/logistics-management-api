<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShipmentRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;

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

    public function show(Shipment $shipment)
    {
        return response()->json([
            'data' => $shipment,
        ]);
    }

    public function update(Request $request, Shipment $shipment)
    {
        $shipment->update(
            $request->only([
                'origin_address',
                'destination_address',
            ])
        );

        return response()->json([
            'data' => $shipment,
        ]);
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return response()->noContent();
    }
}
