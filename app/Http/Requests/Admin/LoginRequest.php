<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
// use App\Traits\HandlesValidationErrorsTrait;

class LoginRequest extends FormRequest
{   
    // use HandlesValidationErrorsTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => ['required', 'email:filter',],
            'password'  => ['required', 'string',]
        ];
    }


}
