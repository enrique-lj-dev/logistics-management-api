<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShipmentRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'Client is required.',
            'client_id.exists' => 'Client does not exist.',
            'origin_address.required' => 'Origin address is required.',
            'destination_address.required' => 'Destination address is required.',
        ];
    }
}
