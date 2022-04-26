<?php

declare(strict_types = 1);

namespace App\Services\Messages;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Traits\Conditionable;

class MessageDto
{
    use Conditionable;

    private string|null $text = null;
    private Message|null $message = null;

    public function __construct(public readonly User $owner) { }

    public static function by(User $user): static
    {
        return new static(...func_get_args());
    }

    public function type(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function answerFor(Message $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function itsAnswer(): bool
    {
        return ! is_null($this->message);
    }

    public function message(): Message|null
    {
        return $this->message;
    }

    public function text(): string|null
    {
        return $this->text;
    }

    public function toArray(): array
    {
        return [
            'text'      => $this->text,
            'is_answer' => $this->itsAnswer(),
        ];
    }
}
