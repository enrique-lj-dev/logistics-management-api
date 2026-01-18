<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', 'in:b2b,b2c'],
            'name' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'address' => ['required', 'string'],
        ]);

        $client = Client::create($validated);

        return response()->json([
            'data' => $client,
        ], 201);
    }
}
