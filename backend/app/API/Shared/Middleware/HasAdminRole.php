<?php

declare(strict_types = 1);

namespace App\API\Shared\Middleware;

use Closure;
use App\Enums\RoleEnums;
use Symfony\Component\HttpFoundation\Response;

class HasAdminRole
{
    public function handle($request, Closure $next,)
    {
        if (user()->role !== RoleEnums::ADMIN) {
            return response()->json([
                'message' => 'forbidden',
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
