<?php

use App\Public\Controllers\Entries\DeleteController;
use App\Public\Controllers\Entries\IndexController;
use App\Public\Controllers\Entries\ShowController;
use App\Public\Controllers\Entries\StoreController;
use App\Public\Controllers\Entries\UpdateController;
use Illuminate\Support\Facades\Route;

Route::post('/Entries', [StoreController::class, 'store']);

Route::get('/Entries', [IndexController::class, 'index']);

Route::get('/Entries/{id}', [ShowController::class, 'show']);

Route::delete('/Entries/{id}', [DeleteController::class, 'delete']);

Route::put('/Entries/{id}', [UpdateController::class, 'update']);
