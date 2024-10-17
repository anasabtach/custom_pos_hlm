<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'category_name'         => ['required', 'string', 'max:50', Rule::unique('categories', 'name')->ignore((isset($this->category_id) ? hashid_decode($this->category_id) : ''))],
            'category_id'           => ['nullable', 'string',' max:50']
        ];
    }
}
