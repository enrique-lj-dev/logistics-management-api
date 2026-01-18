<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;

Route::prefix('v1')->group(function () {
    Route::post('/clients', [ClientController::class, 'store']);
});
