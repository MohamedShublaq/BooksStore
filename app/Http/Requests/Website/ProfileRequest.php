<?php

namespace App\Http\Requests\Website;

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
            'first_name' => ['required','string','min:3'],
            'last_name' => ['required','string','min:3'],
            'email' => ['required','email','unique:users,email,' . auth('web')->user()->id],
            'phone' => ['required','string','unique:users,phone,' . auth('web')->user()->id],
            'addresses' => ['required', 'array', 'min:1'],
            'addresses.*' => ['required', 'string'],
        ];
    }
}
