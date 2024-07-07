<?php

namespace App\Entries\Providers;

use Illuminate\Support\ServiceProvider;

class APIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(\App\Entries\Contracts\API\EntriesAPIContract::class, \App\Entries\API\EntriesAPI::class);
    }
}
