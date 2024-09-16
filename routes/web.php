<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/{any}', function () {
    return view('main');
});

Route::get('/new', [TestController::class, 'controllerMethod']);

