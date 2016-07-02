<?php

namespace App\Providers;

use App\Shop\Shop;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.shop', function ($view) {
            $view->with('user', \Auth::user());
            $view->with('categories', \App\Shop\Category::all());
        });

        view()->composer('shop.layouts.admin', function ($view) {
            $view->with('user', \Auth::user());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Shop::class, function ($app) {
            return new Shop();
        });
    }
}
