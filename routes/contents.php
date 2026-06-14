<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContentController;

Route::prefix('contents')
    ->group(function () {

        Route::get('/', [
            ContentController::class,
            'index'
        ]);

        Route::get('/{content}', [
            ContentController::class,
            'show'
        ]);

    });