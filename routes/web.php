<?php

use Illuminate\Support\Facades\Route;

Route::get('/',  \App\Http\Controllers\HomeController::class)->name('home');

Route::post('/login',  [\App\Http\Controllers\LoginController::class, 'store']);
