<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
            'brand_name'          => ['required', 'string', 'max:50', Rule::unique('brands', 'name')->ignore((isset($this->brand_id) ? hashid_decode($this->brand_id) : ''))],
            'brand_id'   => ['nullable', 'string',' max:50']
        ];
    }
}
