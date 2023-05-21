<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => 'required|string|max:7',
            'daily_price' => 'required|numeric|max:5',
            'placeholder' => 'required|string',
            'status' => 'required|numeric|boolean',
            'card_id'=> 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}

