<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'card_number' => 'required|string|max:255',
            'card_expiry' => 'required|string|max:255',
            'card_cvv' => 'required|string|max:255',
        ];
    }
}
