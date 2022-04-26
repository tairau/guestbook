<?php

declare(strict_types = 1);

namespace App\API\Messages;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 */
class MessageAuthorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'    => $this->id,
            'email' => $this->email,
        ];
    }
}
