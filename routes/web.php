<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Pimpinan\PimpinanController;
use App\Http\Controllers\TindakLanjutLayananController;
use App\Http\Middleware\loginCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ForgotPasswordPemohonController;
use App\Http\Controllers\MandateController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\RequestOpdController;
use App\Http\Middleware\loginCheckPemohon;
use App\Models\Pemohon;

Route::get('/', [HomeController::class, 'index'])->name('home');

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
    route::get('/login-pimpinan', [AuthController::class, 'showLoginForm'])->name('login');
    route::post('/login', [AuthController::class, 'login'])->name('login.post');

    route::get('/register-pemohon', [AuthController::class, 'registerPemohonPage'])->name('registerPage');
    route::get('/login-pemohon', [AuthController::class, 'showLoginPemohon'])->name('loginPemohon');
    route::get('/forgot-password-pemohon', [ForgotPasswordPemohonController::class, 'forgotPemohon'])->name('forgotPemohon');

    route::post('/register-pemohon', [AuthController::class, 'registerPemohon'])->name('registerPemohon');

    Route::get('/generate-captcha', [AuthController::class, 'generateCaptcha']);
        Route::post('/generate-math-captcha', [AuthController::class, 'generateMathCaptcha']);
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
    Route::get('profile-pemohon/', [PemohonController::class, 'profilePage'])->name('pemohon.profile');
    Route::get('/get-kebutuhan/{id_jenis}', [PemohonController::class, 'getKebutuhan']);
    // Route untuk update data profil (Nama & Email)
    Route::put('/profile/update', [PemohonController::class, 'updateProfile'])->name('pemohon.profile.update');

    // Route untuk update password
    Route::put('/profile/password', [PemohonController::class, 'updatePassword'])->name('pemohon.password.update');

    Route::get('pemohon/download-pdf/{id}', [PemohonController::class, 'downloadPdf'])->name('pemohon.download.pdf');
    Route::resource('pemohon', PemohonController::class);

    // Notification routes for pemohon
    Route::post('pemohon/notifications/{id}/read', [PemohonController::class, 'markNotificationRead'])->name('pemohon.notification.read');
    Route::post('pemohon/notifications/read-all', [PemohonController::class, 'markAllNotificationsRead'])->name('pemohon.notification.read-all');
});


route::middleware('check.role:staff')->group(function () {
    Route::get('petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('petugas/berita-acara/create', [PetugasController::class, 'create'])->name('petugas.berita-acara.create');
    Route::post('petugas/berita-acara', [PetugasController::class, 'store'])->name('petugas.berita-acara.store');
    Route::get('petugas/tugas', [PetugasController::class, 'tugas'])->name('petugas.tugas');
    Route::get('petugas/tugas/{id}', [PetugasController::class, 'show'])->name('petugas.show');
    Route::get('petugas/profile', [PetugasController::class, 'profile'])->name('petugas.profile');
    Route::put('petugas/profile/update', [PimpinanController::class, 'updateProfile'])->name('petugas.profile.update');
    Route::put('petugas/profile/password', [PetugasController::class, 'updatePassword'])->name('petugas.password.update');
    Route::post('petugas/tugas/{id}/selesai', [PetugasController::class, 'updateStatus'])->name('petugas.updateStatus');
    Route::post('petugas/notifications/{id}/read', [PetugasController::class, 'markNotificationRead'])->name('petugas.notification.read');
    Route::post('petugas/notifications/read-all', [PetugasController::class, 'markAllNotificationsRead'])->name('petugas.notification.read-all');
});

route::middleware('check.role:kabid')->group(function () {
    Route::get('pimpinan/profile', [PimpinanController::class, 'showProfile'])->name('pimpinan.profile');
    Route::put('pimpinan/profile/update', [PimpinanController::class, 'updateProfile'])->name('pimpinan.profile.update');
    Route::put('pimpinan/profile/password', [PimpinanController::class, 'updatePassword'])->name('pimpinan.password.update');
    Route::get('pimpinan/export-pdf', [PimpinanController::class, 'exportPdf'])->name('pimpinan.export.pdf');
    Route::get('pimpinan/export-excel', [PimpinanController::class, 'exportExcel'])->name('pimpinan.export.excel');
    Route::get('pimpinan/download-pdf/{id}', [PimpinanController::class, 'downloadSinglePdf'])->name('pimpinan.download.pdf');
    route::resource('pimpinan', PimpinanController::class);

    route::resource('mandate', MandateController::class);
    route::get('create-mandate/{noreg}', [MandateController::class, 'createMandate'])->name('pimpinan.mandat')->where('noreg', '.*');
    route::get('mandat-index/{status}', [MandateController::class, 'indexMandat'])->name('indexMandat');

    route::get('ticket-show/{noreg}', [MandateController::class, 'showTicket'])->name('showTicket')->where('noreg', '.*');
});
