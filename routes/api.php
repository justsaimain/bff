<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify',[AuthController::class,'verify']);
    Route::middleware('auth:api')->group(function () {
        Route::get('user', function () {
            return 'user';
        });
    });
});
