<?php

use App\Controllers\PageController;
use App\Core\RouteBuilder as Route;

Route::get(path: '/', handler: [PageController::class, 'index']);
Route::get(path: 'dashboard', handler: [PageController::class, 'dashboard']);
