<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShipmentRequest;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function store(CreateShipmentRequest $request)
    {
        $shipment = Shipment::create($request->validated());

        return (new ShipmentResource($shipment))
            ->response()
            ->setStatusCode(201);
    }

    public function index()
    {
        return ShipmentResource::collection(
            Shipment::paginate(15)
        );
    }

    public function show(Shipment $shipment)
    {
        return new ShipmentResource($shipment);
    }

    public function update(Request $request, Shipment $shipment)
    {
        $shipment->update(
            $request->only([
                'origin_address',
                'destination_address',
            ])
        );

        return new ShipmentResource($shipment);
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return response()->noContent();
    }
}
