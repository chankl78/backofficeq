<?php

// Login
Route::post('postlogin', 'Auth\LoginController@authenticate');

// Reset password
Route::post('reset-pass', 'Auth\ResetPasswordController@reset');

// Register
Route::post('register', 'Auth\RegisterController@register');

Route::get('/{any?}', function () {
    return \File::get(public_path() . '/index.html');
})->where('any', '.*');
