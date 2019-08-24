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
    Route::post('login', 'Api\AuthController@login')->middleware('verified');
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
    Route::middleware(['jwt.auth', 'verified'])->group(function() {
        Route::get('default', 'Api\Data\MainController@index');
    });
});
