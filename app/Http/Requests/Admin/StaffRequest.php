<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
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
            'first_name'    => ['required', 'min:3', 'max:30'],
            'last_name'     => ['required', 'min:3', 'max:30'],
            'email'         => ['required', 'min:5', 'max:50', Rule::unique('admins')->ignore(($this->staff_id) ? hashid_decode($this->staff_id) : null)],
            'password'      => ['nullable', 'min:6', 'max:30', 'confirmed'],
            'profile_image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
            'user_type'     => ['required', 'string', 'exists:roles,name'],
            'staff_id'       => ['nullable', 'string', 'max:33']
        ];
    }
}
