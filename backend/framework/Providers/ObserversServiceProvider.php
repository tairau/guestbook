<?php

namespace Framework\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Services\Tokens\Observers\GenerateToken;

class ObserversServiceProvider extends ServiceProvider
{
    public function boot()
    {
        User::observe(GenerateToken::class);
    }
}
