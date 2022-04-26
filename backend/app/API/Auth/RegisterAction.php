<?php

declare(strict_types = 1);

namespace App\API\Auth;

use App\Services\Auth\RegisterNewUser;
use Vyuldashev\LaravelOpenApi\Attributes;
use Framework\Http\Controllers\Controller;
use App\API\Auth\Docs\Responses\AuthResponse;
use App\API\Auth\Docs\RequestBodies\RegisterRequestBody;

#[Attributes\PathItem]
class RegisterAction extends Controller
{
    /**
     * Регистрация
     */
    #[Attributes\Operation(tags: ['Авторизация'])]
    #[Attributes\RequestBody(RegisterRequestBody::class)]
    #[Attributes\Response(AuthResponse::class)]
    public function __invoke(RegisterRequest $request, RegisterNewUser $registerNewUser): array
    {
        $user = $registerNewUser->register($request->userData());

        return [
            'data'  => UserResource::make($user),
            'token' => $user->api_token,
        ];
    }
}
