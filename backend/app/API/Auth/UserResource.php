<?php

declare(strict_types = 1);

namespace App\API\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                       => $this->id,
            'email'                    => $this->email,
            'connection_token'         => $this->generateCentrifugoToken(),
        ];
    }
}
