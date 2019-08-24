<?php

Route::get('/{any?}', function () {
    return \File::get(public_path() . '/index.html');
})->where('any', '.*');
