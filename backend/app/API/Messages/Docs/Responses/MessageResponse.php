<?php

declare(strict_types = 1);

namespace App\API\Messages\Docs\Responses;

use App\API\Docs\Responses\BaseResponseFactory;
use App\API\Messages\Docs\Schemas\MessageSchema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;

class MessageResponse extends BaseResponseFactory implements Reusable
{
    protected function properties(): array
    {
        return [
            MessageSchema::ref('data'),
        ];
    }
}
