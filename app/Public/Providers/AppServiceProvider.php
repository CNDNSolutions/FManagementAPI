<?php

namespace App\Public\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->registerDeferredProvider(\App\Entries\Providers\EntriesServiceProvider::class);
    }
}
