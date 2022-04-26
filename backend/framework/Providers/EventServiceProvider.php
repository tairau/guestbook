<?php

namespace Framework\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
    ];

    public function boot()
    {
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
