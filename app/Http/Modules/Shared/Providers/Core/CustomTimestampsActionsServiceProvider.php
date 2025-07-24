<?php

namespace App\Http\Modules\Shared\Providers\Core;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class CustomTimestampsActionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blueprint::macro('customTimestampsActions', function () {
            /** @var \Illuminate\Database\Schema\Blueprint $this */
            $this->timestamp('createdDateTime')->nullable();
            $this->timestamp('updatedDateTime')->nullable();
            $this->timestamp('deletedDateTime')->nullable();
        });
    }
}
