<?php

namespace App\Providers;

use Validator;
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

        Validator::extend('balance', function($attribute, $value, $parameters, $validator) {
            return ($value / 100) <= \Auth::user()->getBalance();
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
