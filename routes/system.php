<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', function () {

    return [
        'status' => 'ok',
        'app' => config('app.name'),
        'time' => now(),
    ];

});