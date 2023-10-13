<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Searchable\Http\Controllers\Search;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/core/search')->as('core.search.')
    ->group(fn () => Route::get('index', Search::class)->name('index'));
