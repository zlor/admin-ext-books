<?php

namespace Encore\Admin\Book;

use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-admin-book');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        Books::boot();
    }
}
