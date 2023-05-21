<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBodyOfSecondSectionRequest extends FormRequest
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
            'name' => 'required|string|max:25',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:13',
            'path' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Field Is Required',
            'name.string' => 'Name Field Must Be Char',
            'name.max' => 'Name Field Must Be Less Than 25 Char',
            'description.required' => 'Description Field Is Required',
            'description.string' => 'Description Field Must Be Char',
            'description.max' => 'Description Field Must Be Less Than 255 Char',
            'icon.required' => 'icon Field Is Required',
            'icon.string' => 'icon Field Must Be Select.',
            'path.required' => 'Image Field Is Required',
            'path.numeric' => 'Image Field Must Be Form Selector',
        ];
    }
}
