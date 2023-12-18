<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'card_number' => [
                'required',
                'digits:20'
            ],
            'pin' => [
                'required',
                'digits:4'
            ],
            'expiry_date' => [
                'required',
                'date_format:Y-m-d'
            ],
            'balance' => [
                'required',
                'numeric'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'card_number.required' => 'The card number is required.',
            'card_number.digits' => 'The card number must be exactly 20 digits.',
            'pin.required' => 'The PIN is required.',
            'pin.digits' => 'The PIN must be exactly 4 digits.',
            'expiry_date.required' => 'The expiry date is required.',
            'expiry_date.date_format' => 'The expiry date does not match the format DD-MM-YYYY.',
            'balance.required' => 'The balance is required.',
            'balance.numeric' => 'The balance must be a number.'
        ];
    }
}
