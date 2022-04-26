<?php

declare(strict_types = 1);

namespace App\API\Messages;

use App\Models\Message;
use Vyuldashev\LaravelOpenApi\Attributes;
use App\API\Shared\Resources\LengthAwarePaginatorResource;
use App\API\Messages\Docs\Responses\PaginatedMessagesResponse;

#[Attributes\PathItem]
class PaginatedMessagesAction
{
    /**
     * Сообщения
     */
    #[Attributes\Operation(tags: ['Сообщения'])]
    #[Attributes\Response(PaginatedMessagesResponse::class)]
    public function __invoke(): array
    {
        $messages = Message::query()
            ->where('is_answer', false)
            ->with(['answer.user', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate();

        return [
            'data' => MessageResource::collection($messages->getCollection()),
            'meta' => LengthAwarePaginatorResource::make($messages),
        ];
    }
}
