<?php

declare(strict_types = 1);

namespace App\Enums;

enum RoleEnums: int
{
    case ADMIN = 1;
    case GUEST = 100;
}
