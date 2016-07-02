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

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login')->name('auth.login');
Route::get('logout', 'Auth\AuthController@logout')->name('auth.logout');

// Registration Routes...
Route::get('register/{referrer?}', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register')->name('auth.register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// Shop E-Commerce Routes
Shop::routes('loja');

// Profile Pictures
Route::get('/pictures/profile/{fileName}', 'User\DashboardController@getProfilePicture');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    /* Finance Routes */
    Route::group(['prefix' => 'finance'], function () {
        Route::resource('quotavalues', 'QuotaValuesController');
        Route::resource('earnings', 'FinancesEarningsController');
        Route::resource('withdrawals', 'WithdrawalsController');

        Route::get('qrequests/accept/{id}', 'QuotaRequestsController@accept')->name('admin.finance.qrequests.accept');
        Route::get('qrequests/reject/{id}', 'QuotaRequestsController@reject')->name('admin.finance.qrequests.reject');
        Route::post('qrequests/accept/{id}', 'QuotaRequestsController@postStatus')->name('admin.finance.qrequests.setstatus');
        Route::resource('qrequests', 'QuotaRequestsController');

        Route::get('wrequests/accept/{id}', 'WithdrawalRequestsController@accept')->name('admin.finance.wrequests.accept');
        Route::get('wrequests/reject/{id}', 'WithdrawalRequestsController@reject')->name('admin.finance.wrequests.reject');
        Route::post('wrequests/accept/{id}', 'WithdrawalRequestsController@postStatus')->name('admin.finance.wrequests.setstatus');
        Route::resource('wrequests', 'WithdrawalRequestsController');
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin::'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/users', 'DashboardController@users')->name('users');
    Route::get('/users/update/{id}', 'DashboardController@updateUser')->name('update_user');
    Route::get('/users/delete/{id}', 'DashboardController@deleteUser')->name('delete_user');
    Route::get('/user/total/{id}', 'DashboardController@total_26w')->name('total_at');

    Route::group(['prefix' => 'finances', 'as' => 'finances::'], function () {
        Route::get('/', 'FinancesController@index')->name('index');
    });

    Route::post('/users/update/{id}', 'DashboardController@postUpdateUser');
});

/* User Routes */
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function () {

    /* Finance Routes */
    Route::group(['prefix' => 'finance'], function () {
        Route::resource('earnings', 'FinancesEarningsController');
        Route::resource('withdrawals', 'WithdrawalsController');
        Route::resource('qrequests', 'QuotaRequestsController');
        Route::resource('wrequests', 'WithdrawalRequestsController');
    });
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth', 'as' => 'user::'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::get('/profile/references', 'DashboardController@references')->name('profile.references');

    Route::group(['prefix' => 'finances', 'as' => 'finances::'], function () {
        Route::get('/', 'FinancesController@index')->name('index');
    });


    Route::post('/profile', 'DashboardController@postProfile');
});

Route::get('/', 'HomeController@home');
Route::get('/thankyou/{username}', 'HomeController@thankyou')->name('thankyou');
Route::get('/register/confirm/{code}', 'Auth\AuthController@confirm')->name('register.confirm');

Route::group(['prefix' => 'emails', 'as' => 'email::'], function () {
    Route::get('signup/{id}', 'EmailController@signup')->name('signup');
});
