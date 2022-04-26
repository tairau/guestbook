<?php

declare(strict_types = 1);

namespace App\Services\Messages\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use App\API\Messages\MessageResource;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AnswerCreated implements ShouldBroadcast
{
    public function __construct(public readonly Message $message)
    {
    }

    public function broadcastAs(): string
    {
        return 'answer.created';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => MessageResource::make($this->message->load('user', 'answer.user')),
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('messages#'. $this->message->user_id),
        ];
    }
}
