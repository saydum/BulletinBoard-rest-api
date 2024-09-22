<?php

use App\Http\Controllers\BulletinController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/bulletins', [BulletinController::class, 'store'])->name('bulletins.store');
});
