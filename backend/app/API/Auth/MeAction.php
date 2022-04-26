<?php

declare(strict_types = 1);

namespace App\API\Auth;

use Vyuldashev\LaravelOpenApi\Attributes;
use Framework\Http\Controllers\Controller;
use App\API\Auth\Docs\Responses\AuthResponse;

#[Attributes\PathItem]
class MeAction extends Controller
{
    /**
     * Авторизованный пользователь
     */
    #[Attributes\Operation(tags: ['Авторизация'])]
    #[Attributes\Response(AuthResponse::class)]
    public function __invoke(): array
    {
        return [
            'data'  => UserResource::make(user()),
            'token' => user()->api_token,
        ];
    }
}
