<?php

use App\Http\Controllers\BulletinController;
use Illuminate\Support\Facades\Route;

// /api/v1/bulletins

Route::prefix('v1')->group(function () {

    Route::get('/bulletins', [BulletinController::class, 'index'])->name('bulletins.index');
    Route::post('/bulletins', [BulletinController::class, 'store'])->name('bulletins.store');
    Route::get('/bulletins/{bulletin}', [BulletinController::class, 'show'])->name('bulletins.show');
});
