<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Pimpinan\PimpinanController;
use App\Http\Middleware\loginCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\MandateController;
use App\Http\Controllers\RequestOpdController;

route::post('/logout', [authController::class, 'logout'])->name('logout');
// web.php (Route)

// Form minta link & proses kirim email
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Form input password baru & proses update
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::middleware(loginCheck::class)->group(function () {
    route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    route::get('/login-pemohon', [AuthController::class, 'showLoginPemohon'])->name('loginPemohon');
    route::post('/login', [AuthController::class, 'login'])->name('login.post');
    route::get('/register-pemohon', [AuthController::class, 'registerPemohonPage'])->name('registerPage');
    route::post('/register-pemohon', [AuthController::class, 'registerPemohon'])->name('registerPemohon');

    Route::get('/generate-captcha', [AuthController::class, 'generateCaptcha']);
    Route::post('/login-pemohon', [AuthController::class, 'loginPemohon'])->name('loginPemohon');
});

route::middleware('check.role:petugas')->group(function () {
    route::resource('petugas', PetugasController::class);
});

route::middleware('check.role:pimpinan')->group(function () {
    Route::get('pimpinan/profile', [PimpinanController::class, 'showProfile'])->name('pimpinan.profile');
    route::resource('pimpinan', PimpinanController::class);

    route::resource('mandate', MandateController::class);
    route::get('create-mandate/{noreg}', [MandateController::class, 'createMandate'])->name('pimpinan.mandat')->where('noreg', '.*');
    route::get('mandat-index/{status}', [MandateController::class, 'indexMandat'])->name('indexMandat');

    route::get('ticket-show/{noreg}', [MandateController::class, 'showTicket'])->name('showTicket')->where('noreg', '.*');
});
