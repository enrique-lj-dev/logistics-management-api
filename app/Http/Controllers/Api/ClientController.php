<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{   
    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());

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

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return response()->json([
            'data' => $client,
        ]);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response()->noContent();
    }

}
