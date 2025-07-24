<?php

namespace App\Http\Modules\Shared\Providers;

use App\Http\Modules\Shared\Providers\Core\CustomTimestampsActionsServiceProvider;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(CustomTimestampsActionsServiceProvider::class);
    }

    public function boot()
    {

    }
}
