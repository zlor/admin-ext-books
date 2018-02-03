<?php

namespace Encore\Admin\Book;

use Encore\Admin\Extension;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Book\Widgets\NavbarMenu;
use Illuminate\Support\Facades\Route;

class Books extends Extension
{
    public static function boot()
    {
        static::registerRoutes();

        Admin::navbar()->add(new NavbarMenu());

        Admin::extend('books', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    public static function registerRoutes()
    {
        /* @var \Illuminate\Routing\Router $router */
        Route::group(['prefix' => config('admin.route.prefix')], function ($router) {
            $attributes = array_merge([
                'middleware' => config('admin.route.middleware'),
            ], static::config('route', []));

            Route::group($attributes, function ($router) {

                /* @var \Illuminate\Routing\Router $router */
                $router->resource('books', 'Encore\Admin\Book\BookController');
            });
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Books', 'books', 'fa-book');

        parent::createPermission('Admin books', 'ext.books', 'books*');
    }
}
