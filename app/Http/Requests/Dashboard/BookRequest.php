<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Discount;
use App\Models\FlashSale;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'image' => [
                Rule::requiredIf(request()->isMethod('post')),
                'file', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'
            ],
            'description' => ['required', 'string', 'min:2'],
            'total_stock' => ['required', 'integer', 'min:1'],
            'pages' => ['required', 'integer', 'min:1'],
            'rate' => ['required', 'numeric', 'min:0'],
            'publish_year' => ['required', 'digits:4', 'integer'],
            'price' => ['required', 'numeric', 'min:1'],
            'is_available' => ['required', 'boolean'],
            'language_id' => ['required', 'exists:languages,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'publisher_id' => ['required', 'exists:publishers,id'],
            'author_id' => ['required', 'exists:authors,id'],
            'discountable_type' => ['sometimes', 'string', function ($attribute, $value, $fail) {
                if (!in_array($value, [Discount::class, FlashSale::class])) {
                    $fail(__('The selected discountable type is invalid.'));
                }
            }],
            'discountable_id' => ['required_if:discountable_type,!=,null', function ($attribute, $value, $fail) {
                $type = $this->input('discountable_type');
                if ($type == Discount::class && !Discount::where('id', $value)->exists()) {
                    $fail(__('The selected discountable ID for Discount is invalid.'));
                } elseif ($type == FlashSale::class && !FlashSale::where('id', $value)->exists()) {
                    $fail(__('The selected discountable ID for FlashSale is invalid.'));
                }
            }],
        ];
    }
}
