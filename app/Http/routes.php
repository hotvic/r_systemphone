<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web', 'auth', 'admin'], 'as' => 'admin::'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/users', 'DashboardController@users')->name('users');
    Route::get('/users/update/{id}', 'DashboardController@updateUser')->name('update_user');
    Route::get('/users/delete/{id}', 'DashboardController@deleteUser')->name('delete_user');

    Route::group(['prefix' => 'finances', 'as' => 'finances::'], function () {
        Route::get('/', 'FinancesController@index')->name('index');

        Route::group(['prefix' => 'investments', 'as' => 'investments::'], function () {
            Route::get('/', 'FinancesController@investments')->name('index');
            Route::get('/investments/new/{id?}', 'FinancesController@newInvestment')->name('new');
        });
        
        Route::group(['prefix' => 'earnings', 'as' => 'earnings::'], function () {
            Route::get('/', 'FinancesController@earnings')->name('index');
            Route::get('/earnings/new/{id?}', 'FinancesController@newEarning')->name('new');
        });
    });
    

    Route::post('/users/update/{id}', 'DashboardController@postUpdateUser');
});

Route::get('/', function () { return redirect('/admin'); });
