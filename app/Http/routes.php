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

    Route::get('irequests/accept/{id}', 'FinancesInvestmentRequestsController@accept')->name('admin.irequests.accept');
    Route::get('irequests/reject/{id}', 'FinancesInvestmentRequestsController@reject')->name('admin.irequests.reject');
    Route::post('irequests/accept/{id}', 'FinancesInvestmentRequestsController@postStatus')->name('admin.irequests.setstatus');
    Route::resource('irequests', 'FinancesInvestmentRequestsController');
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::resource('investments', 'FinancesInvestmentsController');
    Route::resource('earnings', 'FinancesEarningsController');
    Route::resource('withdrawals', 'FinancesWithdrawalsController');
    Route::resource('irequests', 'FinancesInvestmentRequestsController');
    Route::resource('wrequests', 'FinancesWithdrawalRequestsController');
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

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth', 'as' => 'user::'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::get('/users/update/{id}', 'DashboardController@updateUser')->name('update_user');
    Route::get('/users/delete/{id}', 'DashboardController@deleteUser')->name('delete_user');

    Route::group(['prefix' => 'finances', 'as' => 'finances::'], function () {
        Route::get('/', 'FinancesController@index')->name('index');
    });


    Route::post('/users/update/{id}', 'DashboardController@postUpdateUser');
});

Route::get('/', function () { return redirect('/admin'); });
Route::get('/thankyou/{username}', 'HomeController@thankyou')->name('thankyou');
Route::get('/register/confirm/{code}', 'Auth\AuthController@confirm')->name('register.confirm');

Route::group(['prefix' => 'emails', 'as' => 'email::'], function () {
    Route::get('signup/{id}', 'EmailController@signup')->name('signup');
});
