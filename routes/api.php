<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ShipmentController;

Route::prefix('v1')->group(function () {
    Route::post('/clients', [ClientController::class, 'store']);
    Route::post('/shipments', [ShipmentController::class, 'store']);
});
