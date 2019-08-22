<?php

// Login
Route::post('postlogin', 'Auth\LoginController@authenticate');

// Reset password
Route::post('reset-pass', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('refresh-pass', 'Auth\ResetPasswordController@reset')->name('password.reset');

// Register
Route::post('register', 'Auth\RegisterController@register');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/dashboard', 'Dashboard\MainController@index');

Route::get('/{any?}', function () {
    return \File::get(public_path() . '/index.html');
})->where('any', '.*');
