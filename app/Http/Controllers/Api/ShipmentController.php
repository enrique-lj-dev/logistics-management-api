<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    public function store(StoreShipmentRequest $request)
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

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->validated());

        return new ShipmentResource($shipment);
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return response()->noContent();
    }
}
