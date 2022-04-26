<?php

declare(strict_types = 1);

namespace App\API\Docs\Schemas;

use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;
use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;

class PaginationMetaSchema extends SchemaFactory implements Reusable
{
    public function build(): SchemaContract
    {
        return Schema::object(class_basename(static::class))
            ->properties(...$this->properties());
    }

    public function properties(): array
    {
        return [
            Schema::integer('current_page'),
            Schema::integer('from'),
            Schema::integer('last_page'),
            Schema::integer('per_page'),
            Schema::integer('to'),
            Schema::integer('total'),
        ];
    }
}
