<?php

namespace App\Entries\Providers;

use Illuminate\Support\ServiceProvider;

class EntriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->registerDeferredProvider(APIServiceProvider::class);

        $this->app->registerDeferredProvider(ServicesServiceProvider::class);

        $this->app->registerDeferredProvider(RepositoryServiceProvider::class);
    }
}
