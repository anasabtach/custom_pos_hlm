<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'country_id'    => ['required', 'string', 'max:50'],
            'name'          => ['required', 'string', 'max:30'],
            'email'         => ['required', 'string', 'max:30', Rule::unique('customers')->ignore((isset($this->customer_id) ? hashid_decode($this->customer_id) : NULL))],
            'phone_no'      => ['required', 'string', 'max:20', 'digits_between:1,20'],
            'country_code'  => ['required', 'string', 'max:10'],            
            'city'          => ['required', 'string', 'max:30'],
            'address'       => ['required', 'string', 'max:500'],
            'note'          => ['nullable','string', 'max:5000'],
            'dob'           => ['date'],
            'customer_id'   => ['nullable', 'string', 'max:50']
        ];
    }
}
