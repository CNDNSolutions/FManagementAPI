<?php

namespace App\Entries\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(\App\Entries\Contracts\Repository\EntriesRepositoryContract::class, \App\Entries\Repository\EntriesRepository::class);

        $this->app->bind(\App\Entries\Contracts\Repository\CostsRepositoryContract::class, \App\Entries\Repository\CostsRepository::class);
    }
}
