<?php

declare(strict_types = 1);

namespace App\API\Messages;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Message
 */
class MessageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'text'       => $this->text,
            'user'       => MessageAuthorResource::make($this->whenLoaded('user')),
            'answer'     => MessageResource::make($this->whenLoaded('answer')),
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
