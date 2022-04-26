<?php

declare(strict_types = 1);

namespace App\Services\Tokens\Observers;

use App\Services\Tokens\Contracts\HasApiToken;

class GenerateToken
{
    public function creating(HasApiToken $entity): void
    {
        if ($entity->{$entity->columnName()} !== null) {
            return;
        }

        $entity->{$entity->columnName()} = $entity->generateApiToken();
    }
}
