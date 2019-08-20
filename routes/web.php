<?php

// Login
Route::post('postlogin', 'Auth\LoginController@authenticate');

Route::get('/{any?}', function () {
    return \File::get(public_path() . '/index.html');
})->where('any', '.*');
