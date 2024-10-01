<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'date'                      => ['required', 'date'],
            'supplier_id'               => ['required', 'string', 'max:50'],
            'product_id'                => ['array'],
            'product_id.*'              => ['required', 'string'],
            'product_variation_id'      => ['array'],
            'product_variation_id.*'    => ['nullable', 'string'],
            'cost'                      => ['array'],
            'cost.*'                    => ['required', 'numeric'],
            'qty'                       => ['array'],
            'qty.*'                     => ['required', 'numeric'], // Changed from digits_between to numeric
            'expiration'                => ['array'],
            'expiration.*'              => ['nullable', 'date'],
            'purchase_id'               => ['nullable', 'string', 'max:50']
        ];
    }
}
