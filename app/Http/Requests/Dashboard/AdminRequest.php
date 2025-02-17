<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $isUpdate = $this->route('admin') !== null;
        $rules = [
            'name.en' => ['required', 'min:2', 'max:50'],
            'name.ar' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'role_id' => ['required', 'exists:authorizations,id'],
        ];

        if ($isUpdate) {
            $adminId = $this->route('admin');
            $rules['email'] = ['required', 'email', 'unique:admins,email,' . $adminId];
        } else {
            $rules['password'] = ['required', 'min:8', 'confirmed'];
            $rules['password_confirmation'] = ['required'];
        }

        return $rules;
    }
}
