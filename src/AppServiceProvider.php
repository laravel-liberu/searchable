<?php

namespace LaravelLiberu\Searchable;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Searchable\Services\Search;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        'search' => Search::class,
    ];

    public function boot()
    {
        $this->load()
            ->publish();
    }

    private function load()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->mergeConfigFrom(__DIR__.'/../config/searchable.php', 'liberu.searchable');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['searchable-config', 'liberu-config']);

        $this->publishes([
            __DIR__.'/../stubs/SearchServiceProvider.stub' => app_path('Providers/SearchServiceProvider.php'),
        ], 'search-provider');
    }
}
