<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'name'          => ['required', 'min:2', 'max:20', Rule::unique('roles')->ignore($this->role_id ? hashid_decode($this->role_id) : NULL)],
            'permissions'   => ['required','array'],
            'role_id'       => ['nullable', 'string', 'max:50']
        ];
    }
}
