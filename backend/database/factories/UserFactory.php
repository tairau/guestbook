<?php

namespace Database\Factories;

use App\Enums\RoleEnums;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email'    => $this->faker->unique()->safeEmail(),
            'role'     => RoleEnums::GUEST,
            'password' => 'password',
        ];
    }

    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => RoleEnums::ADMIN,
            ];
        });
    }
}
