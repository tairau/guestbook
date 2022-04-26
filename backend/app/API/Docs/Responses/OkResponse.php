<?php

declare(strict_types = 1);

namespace App\API\Docs\Responses;

use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;

class OkResponse extends BaseResponseFactory implements Reusable
{
    protected function properties(): array
    {
        return [
            Schema::string('message')->default('ok'),
        ];
    }
}
