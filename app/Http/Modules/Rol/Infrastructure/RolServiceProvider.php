<?php

namespace App\Http\Modules\Rol\Infrastructure;

use App\Http\Modules\Rol\Domain\RolDomainService;
use App\Http\Modules\Rol\Domain\RolServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RolServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RolServiceInterface::class, RolDomainService::class);
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
