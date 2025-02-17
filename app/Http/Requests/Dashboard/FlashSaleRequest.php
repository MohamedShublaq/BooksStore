<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FlashSaleRequest extends FormRequest
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
            'name.en' => ['nullable','string','min:2'],
            'name.ar' => ['nullable','string','min:2'],
            'description.en' => ['nullable','string','min:2'],
            'description.ar' => ['nullable','string','min:2'],
            'date' => ['required', 'date', 'after_or_equal:now'],
            'time' => ['required', 'integer', 'min:1'],
            'percentage' => ['required', 'numeric', 'min:1', 'max:90'],
        ];
    }
}
