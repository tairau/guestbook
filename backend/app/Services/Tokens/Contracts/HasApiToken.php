<?php

declare(strict_types = 1);

namespace App\Services\Tokens\Contracts;

interface HasApiToken
{
    public function columnName(): string;

    public function generateApiToken(): string;
}
