<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
    {   //dd($this->all());
        return [
            'category_id'      => ['required', 'string', 'max:50'],
            'unit_id'          => ['nullable', 'string', 'max:50'],
            'product_name'     => ['required', 'string', 'min:1', 'max:50', Rule::unique('products', 'name')->ignore((isset($this->product_id) ? hashid_decode($this->product_id) : NULL))],
            'sku'              => ['required', 'string', 'min:1','max:30', Rule::unique('products')->ignore((isset($this->product_id) ? hashid_decode($this->product_id) : NULL))],
            'price'            => ['required', 'numeric', 'digits_between:1,10'],
            'stock'            => ['required', 'numeric', 'digits_between:1,10'],
            'stock_alert'      => ['required', 'numeric', 'digits_between:1,10', 'lt:stock'],
            'expiration'       => ['nullable', 'date_format:Y-m-d', 'string', 'max:10'],
            'description'      => ['nullable', 'string', 'max:65000'],
            'has_variation'    => ['required', 'boolean'],
            'product_thumbnail'=> ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'], 
            //variation validation
            'variation_sku'           => ['required_if:has_variation,1', 'array'],
            'variation_sku.*'         => ['required', 'string', 'min:1','max:30'],
            'variation_unit_id'       => ['array'],
            'variation_unit_id.*'     => ['nullable', 'string', 'min:1','max:50'],
            'variation_price'         => ['required_if:has_variation,1', 'array'],
            'variation_price.*'       => ['required', 'numeric', 'digits_between:1,10'],
            'variation_stock'         => ['required_if:has_variation,1', 'array'],
            'variation_stock.*'       => ['required', 'numeric', 'digits_between:1,10'],
            'variation_stock_alert'   => ['required_if:has_variation,1', 'array'],
            'variation_stock_alert.*' => ['required', 'numeric', 'digits_between:1,10', 'lt:variation_stock.*'],
            'variation_expiration'    => ['required_if:has_variation,1', 'array'],
            'variation_expiration.*'  => ['nullable', 'date_format:Y-m-d', 'max:10'],
            'product_id'              => ['nullable', 'string', 'max:50']
        ];
    }
}
