<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeamController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get(
    '/groups',
    [GroupController::class, 'index']
);

Route::get(
    '/groups/{group}',
    [GroupController::class, 'show']
);

Route::get(
    '/teams',
    [TeamController::class, 'index']
);

Route::get(
    '/teams/{team}',
    [TeamController::class, 'show']
);


require __DIR__.'/auth.php';
require __DIR__.'/contents.php';
require __DIR__.'/chat.php';
require __DIR__.'/system.php';

