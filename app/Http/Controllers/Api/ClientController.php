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

    public function index()
    {
        $clients = Client::paginate(15);

        return response()->json([
            'data' => $clients->items(),
            'links' => [
                'first' => $clients->url(1),
                'last' => $clients->url($clients->lastPage()),
                'prev' => $clients->previousPageUrl(),
                'next' => $clients->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $clients->currentPage(),
                'from' => $clients->firstItem(),
                'last_page' => $clients->lastPage(),
                'per_page' => $clients->perPage(),
                'to' => $clients->lastItem(),
                'total' => $clients->total(),
            ],
        ]);
    }

    public function show(Client $client)
    {
        return response()->json([
            'data' => $client,
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'nullable', 'email'],
            'phone' => ['sometimes', 'nullable', 'string'],
            'address' => ['sometimes', 'string'],
        ]);

        $client->update($validated);

        return response()->json([
            'data' => $client,
        ]);
    }

}
