<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ShipmentController;

Route::prefix('v1')->group(function () {

    //Clients
    Route::post('/clients', [ClientController::class, 'store']);
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/{client}', [ClientController::class, 'show']);
    Route::put('/clients/{client}', [ClientController::class, 'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

    //Shipments
    Route::post('/shipments', [ShipmentController::class, 'store']);
    Route::get('/shipments', [ShipmentController::class, 'index']);
    Route::get('/shipments/{shipment}', [ShipmentController::class, 'show']);
});
