<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequisitionRequest extends FormRequest
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
            'category_id'               => ['required', 'string', 'max:50'],
            'supplier_id'               => ['required', 'string', 'max:50'],
            'product_id'                => ['required', 'string', 'max:50'],
            'brand_id'                  => ['required', 'string', 'max:50'],
            'unit_id'                   => ['required', 'string', 'max:50'],
            'is_color'                  => ['required', 'string', 'in:yes,no'],
            'color'                     => ['nullable', 'string'],
            'temperature_control'       => ['required', 'string', 'in:1,0'],
            'order_quantity'            => ['required', 'numeric'],
            'price'                     => ['required', 'numeric'],
            'sku'                       => ['nullable', 'string'],
            'payment_type'              => ['required', 'string', 'in:pdc,transfer,online'],
            'payment_terms'             => ['required', 'string', 'max:65000'],
            'remarks'                   => ['required', 'string', 'max:65000'],
            'material_requisition_id'   => ['nullable', 'string', 'max:50']
        ];
    }
}
