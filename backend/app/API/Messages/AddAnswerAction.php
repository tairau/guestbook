<?php

declare(strict_types = 1);

namespace App\API\Messages;

use App\API\Docs\Responses\OkResponse;
use App\Services\Messages\MessageService;
use Vyuldashev\LaravelOpenApi\Attributes;
use App\API\Messages\Docs\Responses\MessageResponse;
use App\API\Messages\Docs\RequestBodies\MessageRequestBody;

#[Attributes\PathItem]
class AddAnswerAction
{
    /**
     * Ответ на сообщение админом
     */
    #[Attributes\Operation(tags: ['Сообщения'])]
    #[Attributes\RequestBody(MessageRequestBody::class)]
    #[Attributes\Response(MessageResponse::class)]
    public function __invoke(int $id, MessageRequest $request, MessageService $messageService): array
    {
        $message = $messageService->receiveMessage($id);

        $messageService->add($request->message()->answerFor($message));

        return [
            'data' => MessageResource::make($message),
        ];
    }
}
