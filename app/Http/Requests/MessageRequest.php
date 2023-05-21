<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => 'required|max:14',
            'email' => 'required|max:30|email',
            'phone' => 'required|max:11',
            'case' => 'required|max:20',
            'subject' => 'required|string|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.max' => 'Name Must Be Less Than 14 Char',

            'email.required' => 'Email field is required.',
            'email.max' => 'Email Must Be Less Than 30 Char',
            'email.email' => 'Email Must Be Email.',

            'path.required' => 'Image field is required.',
            'path.image' => 'File Must Be Image.',

            'phone.required' => 'Phone field is required.',
            'phone.numeric' => 'Phone field Must Be Numbers.',
            'phone.max' => 'Phone Must Be Less Than 11 Char',

            'subject.required' => 'Subject field is required.',
            'subject.string' => 'Subject Must Be Only Text.',
            'subject.max' => 'Subject Must Be Less Than 50 Char'
        ];
    }
}
