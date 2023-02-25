<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShipmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'address_1' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'state' => ['required', 'max:255'],
            'zip' => [
                'required',
                'regex:/^[0-9]{3,7}$/', // ? numeric digits only, at least 3 but no more than 7
            ],
            'type' => [
                'required',
                Rule::in(['TRUCK', 'PLANE']),
            ],
            'expected' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'address_2' => ['max:255'],
        ];
    }
}
