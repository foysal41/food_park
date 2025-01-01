<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
           'thumb_image' => ['nullable' , 'image' , 'max:3000'],
            'name' => ['nullable' , 'max: 255'],
            'category' => ['nullable' , 'integer'],
            'price' => ['nullable' ],
            'offer_price' => ['nullable'],
            'short_description' => ['nullable' , 'max: 500'],
            'long_description' => ['nullable' ],
            'sku' => ['nullable' , 'max: 255'],
            'seo_title' => ['nullable' , 'max: 255'],
            'seo_description' => ['nullable' , 'max: 255'],
            'show_at_home' => ['boolean'],
            'status' => ['boolean'],
        ];
    }
}
