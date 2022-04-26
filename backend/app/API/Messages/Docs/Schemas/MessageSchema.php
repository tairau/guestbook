<?php

declare(strict_types = 1);

namespace App\API\Messages\Docs\Schemas;

use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;
use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;

class MessageSchema extends SchemaFactory implements Reusable
{
    public function build(): SchemaContract
    {
        return Schema::object('Message')
            ->properties(
                Schema::integer('id'),
                Schema::string('text'),
                MessageAuthorSchema::ref('user'),
                Schema::string('created_at'),
            );
    }
}
