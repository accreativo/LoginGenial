<?php

namespace App\Http\Modules\Shared\Providers;

use App\Http\Modules\Authentication\Infrastructure\AuthenticationServiceProvider;
use App\Http\Modules\Rol\Infrastructure\RolServiceProvider;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(AuthenticationServiceProvider::class);
        $this->app->register(RolServiceProvider::class);
    }

    public function boot()
    {

    }
}
