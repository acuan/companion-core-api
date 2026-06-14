<?php

use Illuminate\Support\Facades\Route;

use App\Domains\Chat\Controllers\ChatController;

Route::middleware('auth:sanctum')
    ->prefix('chat')
    ->group(function () {

        Route::post('/', [
            ChatController::class,
            'ask'
        ]);

    });