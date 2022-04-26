<?php

declare(strict_types = 1);

namespace App\API\Messages\Docs\Responses;

use App\API\Docs\Schemas\PaginationMetaSchema;
use App\API\Docs\Responses\BaseResponseFactory;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use App\API\Messages\Docs\Schemas\MessageWithAnswerSchema;

class PaginatedMessagesResponse extends BaseResponseFactory implements Reusable
{
    protected function properties(): array
    {
        return [
            Schema::array('data')->items(MessageWithAnswerSchema::ref()),
            PaginationMetaSchema::ref('meta'),
        ];
    }
}
