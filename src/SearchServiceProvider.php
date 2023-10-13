<?php

namespace LaravelLiberu\Searchable;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Searchable\Facades\Search;

class SearchServiceProvider extends ServiceProvider
{
    public $register = [];

    public function boot()
    {
        Search::register($this->register);
    }
}
