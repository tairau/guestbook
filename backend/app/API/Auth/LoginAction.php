<?php

declare(strict_types = 1);

namespace App\API\Auth;

use App\Services\Auth\LoginUser;
use Vyuldashev\LaravelOpenApi\Attributes;
use Framework\Http\Controllers\Controller;
use App\API\Auth\Docs\Responses\AuthResponse;
use App\API\Auth\Docs\RequestBodies\LoginRequestBody;

#[Attributes\PathItem]
class LoginAction extends Controller
{
    /**
     * Авторизация
     */
    #[Attributes\Operation(tags: ['Авторизация'])]
    #[Attributes\RequestBody(LoginRequestBody::class)]
    #[Attributes\Response(AuthResponse::class)]
    public function __invoke(LoginRequest $request, LoginUser $loginUser): array
    {
        $user = $loginUser->login($request->credentials());

        return [
            'data' => UserResource::make($user),
            'token' => $user->api_token,
        ];
    }
}
