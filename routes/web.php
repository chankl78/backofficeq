<?php

// Login
Route::post('postlogin', 'Auth\LoginController@authenticate');

// Reset password
Route::post('reset-pass', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('refresh-pass', 'Auth\ResetPasswordController@reset')->name('password.reset');

// Register
Route::post('register', 'Auth\RegisterController@register');

//Auth::routes(['verify' => true]);

Route::get('/dashboard', 'Dashboard\MainController@index');//->middleware('verified');

Route::get('/{any?}', function () {
    return \File::get(public_path() . '/index.html');
})->where('any', '.*');
