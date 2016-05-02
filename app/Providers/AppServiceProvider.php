<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.admin', function ($view) {
            $view->with('user', \Auth::user());
        });
        view()->composer('layouts.user', function ($view) {
            $view->with('user', \Auth::user());
        });

        \Bouncer::seeder(function () {
            \Bouncer::allow('admin')->to(['edit-users', 'client']);
            \Bouncer::allow('client')->to('client');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
