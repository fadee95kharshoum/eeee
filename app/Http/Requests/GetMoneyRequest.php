<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetMoneyRequest extends FormRequest
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
            'money' => 'required|numeric',
            'country' => 'required|max:15|string',
            'place_for_delivery' => 'required|string|max:20',
            'method_id' => 'required|numeric',
            'phone' => 'required|max:15'
        ];
    }
    public function messages()
    {
        return [
            'money.required' => 'Select How Much Of Money You Get.',
            'money.numeric' => 'Plz Send In Field Money A number',

            'country.required' => 'country field is required.',
            'country.max' => 'country Must Be Less Than 10 Char',
            'country.string' => 'country Must Be A Word.',

            'place_for_delivery.required' => 'place for delivery field is required.',
            'place_for_delivery.max' => 'Fplace for delivery Must Be Less Than 15 Char.',

            'method_id.required' => 'Method field is required.',
            'method_id.numeric' => 'Methd Most Be a Selector From Your Page.',
        ];
    }
}
