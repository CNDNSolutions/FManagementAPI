<?php

namespace App\Entries\Providers;

use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(\App\Entries\Contracts\Services\IndexServiceContract::class, \App\Entries\Services\IndexService::class);

        $this->app->bind(\App\Entries\Contracts\Services\ShowServiceContract::class, \App\Entries\Services\ShowService::class);

        $this->app->bind(\App\Entries\Contracts\Services\StoreServiceContract::class, \App\Entries\Services\StoreService::class);

        $this->app->bind(\App\Entries\Contracts\Services\UpdateServiceContract::class, \App\Entries\Services\UpdateService::class);

        $this->app->bind(\App\Entries\Contracts\Services\DeleteServiceContract::class, \App\Entries\Services\DeleteService::class);
    }
}
