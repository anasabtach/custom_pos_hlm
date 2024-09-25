<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitRequest extends FormRequest
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
            'unit_name'    => ['required', 'string', 'max:20',  Rule::unique('units', 'name')->ignore((isset($this->unit_id) ? hashid_decode($this->unit_id) : ''))],
            'short_hand'   => ['required', 'string', 'max:10', Rule::unique('units')->ignore((isset($this->unit_id) ? hashid_decode($this->unit_id) : ''))],
            'unit_id'      => ['nullable', 'string',' max:50']
        ];
    }
}
