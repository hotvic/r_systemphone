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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('investments', 'FinancesInvestmentsController');
    Route::resource('earnings', 'FinancesEarningsController');
    Route::resource('withdrawals', 'FinancesWithdrawalsController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web', 'auth', 'admin'], 'as' => 'admin::'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/users', 'DashboardController@users')->name('users');
    Route::get('/users/update/{id}', 'DashboardController@updateUser')->name('update_user');
    Route::get('/users/delete/{id}', 'DashboardController@deleteUser')->name('delete_user');

    Route::group(['prefix' => 'finances', 'as' => 'finances::'], function () {
        Route::get('/', 'FinancesController@index')->name('index');
    });


    Route::post('/users/update/{id}', 'DashboardController@postUpdateUser');
});

Route::get('/', function () { return redirect('/admin'); });
Route::get('/thankyou/{id}', 'HomeController@thankyou')->name('thankyou');
Route::get('/register/confirm/{code}', 'Auth\AuthController@confirm')->name('register.confirm');

Route::group(['prefix' => 'emails', 'as' => 'email::'], function () {
    Route::get('signup/{id}', 'EmailController@signup')->name('signup');
});
