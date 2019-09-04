<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('auth')->group(function () {
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');//->middleware('verified');
    Route::get('refresh', 'Api\AuthController@refresh');
    Route::post('forgot', 'Api\ForgotPasswordController@sendResetLinkEmail');
    Route::get('email/verify/{id}', 'Api\VerificationController@verify')->name('verification.verify');
    Route::get('reset', 'Api\ResetPasswordController@reset')->name('password.reset');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('user', 'Api\AuthController@user');
        Route::post('logout', 'Api\AuthController@logout');
    });
});

Route::prefix('data')->group(function () {
    Route::middleware(['api', 'auth:api', 'permission:read'])->group(function() {
        Route::get('default', 'Api\Data\MainController@index');
        Route::get('profile', 'Api\Data\ProfileController@details');
        Route::put('profile', 'Api\Data\ProfileController@update');
        Route::get('activities', 'Api\Data\ProfileController@activities');
        Route::get('email/resend-verification', 'Api\VerificationController@resend')->name('verification.resend');
        Route::group(['middleware' => ['role:system-administrator|software-administrator']], function() {
            Route::get('roles', 'Api\Data\RolesController@index');
            Route::get('role', 'Api\Data\RolesController@role');
            Route::post('role', 'Api\Data\RolesController@create');
            Route::put('role', 'Api\Data\RolesController@update');
            Route::delete('role', 'Api\Data\RolesController@delete');
            Route::get('user/list', 'Api\Data\UsersController@index');
            Route::get('user/info', 'Api\Data\UsersController@info');
            Route::put('user/update', 'Api\Data\UsersController@update');
            Route::delete('user/delete', 'Api\Data\UsersController@delete');
            Route::get('types', 'Api\Data\TypesController@index');
            Route::get('type', 'Api\Data\TypesController@type');
            Route::post('type', 'Api\Data\TypesController@create');
            Route::put('type', 'Api\Data\TypesController@update');
            Route::delete('type', 'Api\Data\TypesController@delete');
            Route::get('statuses', 'Api\Data\StatusesController@index');
            Route::get('status', 'Api\Data\StatusesController@status');
            Route::post('status', 'Api\Data\StatusesController@create');
            Route::put('status', 'Api\Data\StatusesController@update');
            Route::delete('status', 'Api\Data\StatusesController@delete');
        });
    });
});
