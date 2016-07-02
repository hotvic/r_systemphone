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
            Route::get('/', 'ProductsController@showListPage');

            Route::get('/product/{slug}', 'ProductsController@show')->name('shop.product');
            Route::get('/catalog/{category?}', 'ProductsController@showListPage')->name('shop.catalog');

            Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
                Route::get('/', 'HomeController@index');

                Route::get('categories', 'CategoriesController@showListPage')->name('shop.admin.categories.list');
                Route::get('categories/new', 'CategoriesController@showNewForm')->name('shop.admin.categories.new');
                Route::get('products', 'ProductsController@showListPage')->name('shop.admin.products.list');
                Route::get('products/new', 'ProductsController@showNewForm')->name('shop.admin.products.new');

                Route::post('categories/new', 'CategoriesController@new');
                Route::post('products/new', 'ProductsController@new');
            });
        });
    }
}