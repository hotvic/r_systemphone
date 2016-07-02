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

            Route::get('pictures/{type}/{id}', 'PicturesController@show')->name('shop.picture');

            Route::get('/product/{slug}', 'ProductsController@show')->name('shop.product');
            Route::get('/catalog/{category?}', 'ProductsController@showListPage')->name('shop.catalog');

            Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
                Route::get('/', 'HomeController@index');

                Route::get('categories', 'CategoriesController@showListPage')->name('shop.admin.categories.list');
                Route::get('categories/new', 'CategoriesController@showNewForm')->name('shop.admin.categories.new');
                Route::get('products', 'ProductsController@showListPage')->name('shop.admin.products.list');
                Route::get('products/new', 'ProductsController@showNewForm')->name('shop.admin.products.new');
                Route::get('products/{id}', 'ProductsController@showEditForm')->name('shop.admin.products.edit');

                Route::post('categories/new', 'CategoriesController@store');
                Route::post('products/new', 'ProductsController@store');
                Route::post('products/{id}', 'ProductsController@edit');
                Route::post('products/{id}/new-photo', 'ProductsController@storePhoto')->name('shop.admin.products.new-photo');;
            });
        });
    }
}