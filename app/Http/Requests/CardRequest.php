<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'name' => 'required|unique:cards|max:14',
            'status' => 'required|boolean'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique' => 'Name Must Be Unique in Your Card List.',
            'name.max' => 'Name Must Be Less Than 14 Char',
            'status.required' => 'status field is required.',
            'status.boolean' => 'status Must Be Yes Or No.'
        ];
    }
}
