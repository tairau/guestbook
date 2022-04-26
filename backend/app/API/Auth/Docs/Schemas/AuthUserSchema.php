<?php

declare(strict_types=1);

namespace App\API\Auth\Docs\Schemas;

use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;
use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;

class AuthUserSchema extends SchemaFactory implements Reusable
{
    public function build(): SchemaContract
    {
        return Schema::object('AuthUser')
            ->properties(
                Schema::integer('id'),
                Schema::string('email'),
                Schema::string('connection_token'),
            );
    }
}
