<?php

// Login
Route::post('postlogin', 'Auth\LoginController@authenticate');

// Reset password
Route::post('reset-pass', 'Auth\ResetPasswordController@reset');

Route::get('/{any?}', function () {
    return \File::get(public_path() . '/index.html');
})->where('any', '.*');
