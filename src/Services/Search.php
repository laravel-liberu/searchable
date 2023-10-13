<?php

namespace LaravelLiberu\Searchable\Services;

use Illuminate\Support\Collection;

class Search
{
    private Collection $models;

    public function __construct()
    {
        $this->models = new Collection();
    }

    public function register($models): void
    {
        $this->models = $this->models->merge($models);
    }

    public function remove($models): void
    {
        Collection::wrap($models)
            ->each(fn ($model) => $this->models->forget($model));
    }

    public function all(): Collection
    {
        return $this->models;
    }
}
