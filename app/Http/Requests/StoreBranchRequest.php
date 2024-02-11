<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreBranchRequest extends FormRequest
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
            'location' => 'required',
            'head' => 'required|numeric',
            'image' => [File::types(['png', 'jpg'])
            ]
        ];
    }

    public function messages(): array
{
    return [
        'location.required' => 'A Description is Required',
        'head.required' => 'A Branch Head is Required',
        'head.numeric' => 'No Head Selected',
    ];
}
}
