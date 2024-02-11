<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreEmployeeRequest extends FormRequest
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
            'lname' => 'required',
            'fname' => 'required',
            'address' => 'required',
            'empPosition' => 'required',
            'age' => 'required|numeric',
            'empClass' => 'required|numeric',
            'empStatus' => 'required|numeric',
            'image' => [File::types(['png', 'jpg'])
            ]
        ];
    }

    public function messages(): array
{
    return [
        'lname.required' => 'Please Input the Last Name',
        'fname.required' => 'Please Input the First Name',
        'address.required' => 'An Address is Required',
        'empPosition.required' => 'A Position is Required',
        'age.required' => 'An Age is Required',
        'empClass.required' => 'A Class is Required',
        'empStatus.required' => 'A Status is Required',

        'age.numeric' => 'Age not in Numeric Value.',
        'empClass.numeric' => 'Please select a Class.',
        'empStatus.numeric' => 'Please select a Status.',
    ];
}
}
