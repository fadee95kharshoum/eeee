<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForSaleRequest extends FormRequest
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
            'name' => 'required|unique:for_sales|max:14',
            'description' => 'required|max:35',
            'path' => 'required|image',
            'status' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique' => 'Name Must Be Unique in Your Card List.',
            'name.max' => 'Name Must Be Less Than 14 Char',
            'description.required' => 'description field is required.',
            'description.max' => 'description Must Be Less Than 35 Char',
            'path.required' => 'Image field is required.',
            'path.image' => 'File Must Be Image.',

            'status.required' => 'status field is required.',
            'status.boolean' => 'status Must Be Yes Or No.'
        ];
    }
}
