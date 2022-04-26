<?php

declare(strict_types = 1);

namespace App\Services\Auth;

use App\Models\User;
use App\Enums\RoleEnums;

class RegisterNewUser
{
    public function register(array $userData): User
    {
        return tap(new User($userData), function (User $user) {
            $user->role = RoleEnums::GUEST;
            $user->save();
        });
    }
}
