<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ClubController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PlayerController;
use App\Http\Controllers\Backend\TestController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->prefix('backend')->name('backend.')->group(function () {
    Route::get('/', [PageController::class, 'index']);

    // Admins
    Route::resource('admins', AdminController::class);
    Route::post('admins/{id}/change-password', [AdminController::class, 'changePassword'])->name('admin.change.password');

    // Clubs
    Route::resource('clubs', ClubController::class);

    // Players
    Route::resource('players', PlayerController::class);

    // Users
    Route::resource('users', UserController::class);


    // Testing
    Route::get('api', [TestController::class, 'getData']);


    // Datatable AJAX
    Route::get(
        'datatable/users/ssd',
        [UserController::class, 'ssd']
    )->name('datatable.users.ssd');
    Route::get('datatable/admins/ssd', [AdminController::class, 'ssd'])->name('datatable.admins.ssd');
    Route::get('datatable/players/ssd', [PlayerController::class, 'ssd'])->name('datatable.players.ssd');
    Route::get('datatable/clubs/ssd', [ClubController::class, 'ssd'])->name('datatable.clubs.ssd');
});
