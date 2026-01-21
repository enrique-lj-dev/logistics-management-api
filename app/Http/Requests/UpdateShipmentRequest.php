<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'priority' => ['sometimes', 'in:low,normal,high'],
            'origin_address' => ['sometimes', 'string'],
            'destination_address' => ['sometimes', 'string'],
            'current_status' => ['sometimes', 'string'],
            'sla_date' => ['sometimes', 'date'],
        ];
    }
}
