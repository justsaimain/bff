<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

Route::get('{all}', function () {
    return view('welcome');
})->where('all', '^(?!api)(?!backend)(?!google).*$');


Route::get('/backend/login', [AdminLoginController::class, 'showLoginForm']);
Route::post('/backend/login', [AdminLoginController::class, 'login'])->name('backend.login');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
