<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Shop extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Shop\Shop';
    }
}