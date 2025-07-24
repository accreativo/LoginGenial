<?php

namespace App\Http\Modules\Authentication\Infrastructure;

use App\Http\Modules\Authentication\Domain\AuthenticationDomainServices;
use App\Http\Modules\Authentication\Domain\Interfaces\CredentialServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AuthenticationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CredentialServiceInterface::class, AuthenticationDomainServices::class);
    }

    public function boot()
    {
        $this->loadRoutes();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    protected function loadRoutes()
    {
        if (file_exists(__DIR__ . '/routes/api.php')) {
            Route::prefix('api')
                ->group(__DIR__ . '/routes/api.php');
        }
    }
}
