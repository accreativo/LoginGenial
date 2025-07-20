<?php

namespace App\Providers;

use App\Http\src\Authentication\Models\CredentialModel;
use App\Http\src\Authentication\Services\CreateCredentialService;
use App\Http\src\Authentication\Services\LoginCredentialService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateCredentialService::class);

        $this->app->bind(LoginCredentialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
