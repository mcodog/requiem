<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreProductRequest extends FormRequest
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
            'description' => 'required',
            'price' => 'required|numeric',
            'categoryId' => 'required|numeric',
            'image' => [File::types(['png', 'jpg'])
            ]
        ];
    }

    public function messages(): array
{
    return [
        'description.required' => 'A Description is Required',
        'price.required' => 'A Price is Required',
        'categoryId.required' => 'A Category is Required',
        'categoryId.numeric' => 'No Category Selected',
    ];
}
}
