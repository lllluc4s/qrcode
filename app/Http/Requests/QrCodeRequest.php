<?php

namespace App\Http\Requests;

use App\Rules\UniqueLinkedInOrGithub;
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
    public function rules()
    {
        return [
            'name' => 'required|string',
            'linkedin' => [
                'required',
                'url',
                new UniqueLinkedInOrGithub(request()->linkedin, request()->github)
            ],
            'github' => [
                'required',
                'url',
                new UniqueLinkedInOrGithub(request()->linkedin, request()->github)
            ],
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
            'linkedin.required' => 'Linkedin URL is required',
            'linkedin.string' => 'Linkedin URL must be a string',
            'linkedin.url' => 'Linkedin URL must be a valid URL',
            'github.required' => 'GitHub URL is required',
            'github.string' => 'GitHub URL must be a string',
            'github.url' => 'GitHub URL must be a valid URL',
            'linkedin.unique_linked_in_or_github' => 'LinkedIn and GitHub URLs must be different.',
            'github.unique_linked_in_or_github' => 'LinkedIn and GitHub URLs must be different.',
        ];
    }
}
