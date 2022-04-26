<?php

declare(strict_types = 1);

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\Auth\VO\CredentialsVO;
use Illuminate\Validation\ValidationException;

class LoginUser
{
    public function login(CredentialsVO $credentials): User|null
    {
        $user = $this->receiveByEmail($credentials->email);

        if ($user && Hash::check($credentials->password, $user->password)) {
            return $user;
        }

        throw ValidationException::withMessages([
            'password' => __('auth.failed'),
        ]);
    }

    public function receiveByEmail(string $email): User|null
    {
        /** @var User $user */
        $user = User::query()
            ->where('email', $email)
            ->first();

        return $user;
    }
}
