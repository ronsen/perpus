<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::get('/login', function () {
	return redirect()->route('home');
})->name('login');

Route::post('/login',  [\App\Http\Controllers\LoginController::class, 'store']);
