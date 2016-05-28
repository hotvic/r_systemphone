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

        Validator::extend('cpf', function($attribute, $value, $parameters, $validator) {
            $cpf = null;

            if (!preg_match('/^(\d{3})\.(\d{3})\.(\d{3})-(\d{2})$/', $value, $cpf)) return false;

            $cpf_digits = $cpf[1] . $cpf[2] . $cpf[3];
            $cpf_val    = $cpf[4];

            $first_val = 0;
            $multplier = 10;
            foreach (str_split($cpf_digits) as $digit)
            {
                $first_val += $digit * $multplier;

                $multplier--;
            }
            $first_val = ($first_val * 10) % 11;
            $first_val = $first_val == 10 ? 0 : $first_val; // Swap 10 by 0

            $second_val = 0;
            $multplier = 11;
            foreach (str_split($cpf_digits . $first_val) as $digit)
            {
                $second_val += $digit * $multplier;

                $multplier--;
            }
            $second_val = ($second_val * 10) % 11;
            $second_val = $second_val == 10 ? 0 : $second_val; // Swap 10 by 0

            return ($first_val . $second_val) == $cpf_val;
        });

        Validator::extend('balance', function($attribute, $value, $parameters, $validator) {
            return ($value / 100) <= \Auth::user()->getBalance();
        });

        Validator::extend('withdrawal_value', function($attribute, $value, $parameters, $validator) {
            return ($value / 100) >= 200 and ($value / 100) <= 5000;
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
