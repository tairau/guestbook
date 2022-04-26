<?php

declare(strict_types = 1);

namespace App\API\Messages;

use App\API\Docs\Responses\OkResponse;
use App\Services\Messages\MessageService;
use Vyuldashev\LaravelOpenApi\Attributes;
use App\API\Messages\Docs\Responses\MessageResponse;
use App\API\Messages\Docs\RequestBodies\MessageRequestBody;

#[Attributes\PathItem]
class AddMessageAction
{
    /**
     * Добавить сообщение
     */
    #[Attributes\Operation(tags: ['Сообщения'])]
    #[Attributes\RequestBody(MessageRequestBody::class)]
    #[Attributes\Response(MessageResponse::class)]
    public function __invoke(MessageRequest $request, MessageService $messageService): array
    {
        $message = $messageService->add($request->message());

        return [
            'data' => MessageResource::make($message),
        ];
    }
}
