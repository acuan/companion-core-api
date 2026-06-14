<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;

Route::middleware('auth:sanctum')
    ->prefix('chat')
    ->group(function () {

        Route::post('/', [
            ChatController::class,
            'ask'
        ]);

    });