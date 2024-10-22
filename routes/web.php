<?php

use App\Http\Controllers\PageController;

Route::get('/index', [PageController::class, 'index']);
