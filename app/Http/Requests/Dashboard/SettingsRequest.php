<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'tax_percentage' => ['required', 'numeric', 'between:0,100'],
            'facebook' => ['required', 'url', 'max:255'],
            'instagram' => ['required', 'url', 'max:255'],
            'youtube' => ['required', 'url', 'max:255'],
            'x' => ['required', 'url', 'max:255'],

        ];
    }
}
