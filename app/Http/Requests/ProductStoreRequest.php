<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
			'price' => ['required', 'numeric', 'min:0'],
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
			'price.required' => 'The field "price" is required.',
			'price.numeric' => 'The price must be a valid number.',
			'price.min' => 'The price must be a more than $0.00.',
		];
	}
}
