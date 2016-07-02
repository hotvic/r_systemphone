<?php

namespace App\Shop;

use Route;

class Shop
{
    protected $domain;

    public function routes($subdomain='shop')
    {
        $domain = sprintf("%s.%s", $subdomain, config('app.domain'));

        Route::group(['domain' => $domain, 'namespace' => 'Shop'], function () {
            Route::get('/', 'HomeController@index');

            Route::get('/product/{slug}', 'ProductsController@show')->name('shop.product');
            Route::get('/catalog/{category?}', 'ProductsController@list')->name('shop.catalog');

            Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
                Route::get('/', 'HomeController@index');

                Route::get('categories', 'CategoriesController@list')->name('shop.admin.categories.list');
                Route::get('categories/new', 'CategoriesController@showNewForm')->name('shop.admin.categories.new');
                Route::get('products', 'CategoriesController@list')->name('shop.admin.products.list');
                Route::get('products/new', 'CategoriesController@new')->name('shop.admin.products.new');

                Route::post('categories/new', 'CategoriesController@new');
            });
        });
    }
}