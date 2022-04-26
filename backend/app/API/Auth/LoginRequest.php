<?php

declare(strict_types = 1);

namespace App\API\Auth;

use App\Services\Auth\VO\CredentialsVO;
use Framework\Http\Requests\Request;

class LoginRequest extends Request
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
                'string',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
            ],
        ];
    }

    public function credentials(): CredentialsVO
    {
        return new CredentialsVO($this->input('email'), $this->input('password'));
    }
}
