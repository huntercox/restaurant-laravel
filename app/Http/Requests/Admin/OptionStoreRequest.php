<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OptionStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'name' => ['required', 'string', 'max:40'],
          'description' => ['nullable', 'string', 'max:255'],
          'price' => [
            'required',
            'numeric',
            'min:0',  // price should be zero or positive
            'regex:/^\d+(\.\d{1,2})?$/',  // price can have up to 2 decimal places
          ],
        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The field "name" is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not be longer than 40 characters.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description must not be longer than 255 characters.',
            'price.required' => 'The field "price" is required.',
            'price.regex' => 'The price must be a valid USD price (up to two decimal places).',
        ];
    }
}
