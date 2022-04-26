<?php

declare(strict_types = 1);

namespace App\Services\Auth\VO;

class CredentialsVO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }
}
