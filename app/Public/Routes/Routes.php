<?php

use App\Public\Controllers\Entries\IndexController;
use App\Public\Controllers\Entries\StoreController;
use Illuminate\Support\Facades\Route;

Route::post('/Entries', [StoreController::class, 'store']);

Route::get('/Entries', [IndexController::class, 'index']);
