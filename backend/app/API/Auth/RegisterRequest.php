<?php

declare(strict_types = 1);

namespace App\API\Auth;

use Framework\Http\Requests\Request;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends Request
{
    protected function prepareForValidation()
    {
        $this->merge([
            'email' => str($this->input('email'))->lower()->toString(),
        ]);
    }

    public function rules(): array
    {
        return [
            'email'    => [
                'required',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'max:255',
                'confirmed',
                Password::min(8)->letters(),
            ],
        ];
    }

    public function userData(): array
    {
        return $this->only([
            'email',
            'password',
        ]);
    }
}
