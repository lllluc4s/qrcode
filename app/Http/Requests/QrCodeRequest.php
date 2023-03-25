<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QrCodeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'linkedin.string' => 'Linkedin URL must be a string',
            'linkedin.url' => 'Linkedin URL must be a valid URL',
            'github.string' => 'GitHub URL must be a string',
            'github.url' => 'GitHub URL must be a valid URL',
        ];
    }
}
