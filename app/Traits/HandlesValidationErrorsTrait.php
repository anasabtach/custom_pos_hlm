<?php
namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;

trait HandlesValidationErrorsTrait
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        foreach ($errors as $error) {
            notify()->error($error);
        }
    }
}
