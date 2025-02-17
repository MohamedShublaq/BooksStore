<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name.en' => ['required', 'min:2', 'max:50'],
            'name.ar' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'unique:admins,email,' . auth('admin')->user()->id],
        ];
    }
}
