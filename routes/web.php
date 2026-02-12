<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\PimpinanController;
use App\Http\Middleware\loginCheck;
use Illuminate\Support\Facades\Route;





Route::middleware(loginCheck::class)->group(function () {

    route::get('/', [authController::class, 'showLoginForm'])->name('login');
    route::post('/login', [authController::class, 'login'])->name('login.post');
});

route::middleware('check.role:petugas')->group(function () {
    route::resource('petugas', petugasController::class);
    route::get('/logout', [authController::class, 'logout'])->name('logout');
});

route::middleware('check.role:pimpinan')->group(function () {
    route::resource('pimpinan', PimpinanController::class);
});
