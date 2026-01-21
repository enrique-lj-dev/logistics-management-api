<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => [
                'required',
                'integer',
                'exists:clients,id',
            ],
            'origin_address' => [
                'required',
                'string',
                'max:255',
            ],
            'destination_address' => [
                'required',
                'string',
                'max:255',
            ],
            'priority' => [
                'sometimes',
                'in:low,normal,high',
            ],
            'sla_date' => [
                'sometimes',
                'date',
            ],
        ];
    }
}
