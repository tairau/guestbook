<?php

declare(strict_types = 1);

namespace App\API\Auth\Docs\Responses;

use App\API\Auth\Docs\Schemas\AuthUserSchema;
use App\API\Docs\Responses\BaseResponseFactory;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;

class AuthResponse extends BaseResponseFactory implements Reusable
{
    protected function properties(): array
    {
        return [
            AuthUserSchema::ref('data'),
            Schema::string('token'),
        ];
    }
}
