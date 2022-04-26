<?php

declare(strict_types = 1);

namespace App\Services\Messages;

use App\Models\Message;
use Illuminate\Support\Facades\DB;
use App\Services\Messages\Events\AnswerCreated;
use App\Services\Messages\Events\MessageCreated;

class MessageService
{
    public function receiveMessage(int $id): Message
    {
        $message = Message::query()
            ->where('is_answer', false)
            ->whereNull('answer_id')
            ->whereKey($id)
            ->firstOrFail();

        /** @var Message $message */
        return $message;
    }

    public function add(MessageDto $messageDto): Message
    {
        return DB::transaction(function () use ($messageDto) {
            $message = new Message($messageDto->toArray());
            $message->user()->associate($messageDto->owner);
            $message->save();

            if ($messageDto->itsAnswer()) {
                $messageDto->message()->answer()->associate($message)->save();
                event(new AnswerCreated($messageDto->message()));
            }

            if (! $messageDto->itsAnswer()) {
                event(new MessageCreated($message));
            }

            return $message;
        });
    }
}
