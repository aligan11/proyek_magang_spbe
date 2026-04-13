<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Pimpinan\PimpinanController;
use App\Http\Middleware\loginCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ForgotPasswordPemohonController;
use App\Http\Controllers\MandateController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\RequestOpdController;
use App\Http\Middleware\loginCheckPemohon;
use App\Models\Pemohon;

route::post('/logout', [authController::class, 'logout'])->name('logout');
route::post('/logout-pemohon', [authController::class, 'logoutPemohon'])->name('logoutPemohon');
// web.php (Route)

// Form minta link & proses kirim email
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Form input password baru & proses update
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::middleware(loginCheck::class)->group(function () {
    route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    route::post('/login', [AuthController::class, 'login'])->name('login.post');

    route::get('/register-pemohon', [AuthController::class, 'registerPemohonPage'])->name('registerPage');
    route::get('/login-pemohon', [AuthController::class, 'showLoginPemohon'])->name('loginPemohon');
    route::get('/forgot-password-pemohon', [ForgotPasswordPemohonController::class, 'forgotPemohon'])->name('forgotPemohon');

    route::post('/register-pemohon', [AuthController::class, 'registerPemohon'])->name('registerPemohon');

    Route::get('/generate-captcha', [AuthController::class, 'generateCaptcha']);
    Route::post('/login-pemohon', [AuthController::class, 'loginPemohon'])->name('login.pemohon');
    Route::post('/forgot-password', [ForgotPasswordPemohonController::class, 'sendResetLink'])->name('password.email');
    Route::get('/otp-pemohon', [ForgotPasswordPemohonController::class, 'otpPagePemohon'])->name('otp.pemohon');
    Route::get('/update-password-pemohon', [ForgotPasswordPemohonController::class, 'updatePasswordPemohon'])->name('update.passwordPemohon');
    Route::post('/resend-otp', [ForgotPasswordPemohonController::class, 'resendOtp'])->name('otp.resend');
    Route::post('/verify-otp', [ForgotPasswordPemohonController::class, 'verifyOtp'])->name('otp.verify');
    Route::post('/reset-password', [ForgotPasswordPemohonController::class, 'updatePassword'])->name('reset.password');
});



Route::middleware(['check.pemohon'])->group(function () {
    Route::get('dashboard-pemohon', [PemohonController::class, 'dashboardPemohon'])->name('dashboardPemohon');
    Route::get('dashboard-pemohon/layanan', [PemohonController::class, 'layananPemohonPage'])->name('pemohon.layanan');
    Route::get('/get-kebutuhan/{id_jenis}', [PemohonController::class, 'getKebutuhan']);

    Route::resource('pemohon', PemohonController::class);
});


route::middleware('check.role:staff')->group(function () {
    route::resource('petugas', PetugasController::class);
});

route::middleware('check.role:kabid')->group(function () {
    Route::get('pimpinan/profile', [PimpinanController::class, 'showProfile'])->name('pimpinan.profile');
    route::resource('pimpinan', PimpinanController::class);

    route::resource('mandate', MandateController::class);
    route::get('create-mandate/{noreg}', [MandateController::class, 'createMandate'])->name('pimpinan.mandat')->where('noreg', '.*');
    route::get('mandat-index/{status}', [MandateController::class, 'indexMandat'])->name('indexMandat');

    route::get('ticket-show/{noreg}', [MandateController::class, 'showTicket'])->name('showTicket')->where('noreg', '.*');
});
