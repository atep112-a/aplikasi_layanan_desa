<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [\App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
Route::resource('/admins', \App\Http\Controllers\AdminController::class);

Route::middleware([App\Http\Middleware\AdminAuth::class])->group(function () {
    Route::resource('/dashboard', \App\Http\Controllers\DashboardController::class);
    Route::resource('SPPT', \App\Http\Controllers\SPPTController::class);
    Route::resource('SKTM', \App\Http\Controllers\SKTMController::class);
    Route::resource('Kelahiran', \App\Http\Controllers\SKLController::class);
    Route::resource('Kematian', \App\Http\Controllers\KematianController::class);
    Route::resource('domisili', \App\Http\Controllers\DomisiliController::class);
    Route::resource('sku', \App\Http\Controllers\SKUController::class);
    Route::resource('skt', \App\Http\Controllers\SKTController::class);
    Route::get('notifications', [AdminController::class, 'getNotifications'])->name('notifications');

});


Route::resource('/user', \App\Http\Controllers\UserController::class);



Route::post('/submit-sktm', [\App\Http\Controllers\SKTMController::class, 'submit'])->name('submit-sktm');
Route::post('/submit-sktm-step1', [\App\Http\Controllers\SKTMController::class, 'submitStep1'])->name('submit-sktm-step1');

Route::get('/form/{service}/{step}', [\App\Http\Controllers\UserController::class, 'showForm'])->name('service.form');
Route::post('/form/{service}/{step}', [\App\Http\Controllers\UserController::class, 'submitForm'])->name('service.submit');

Route::post('/submit-sppt', [\App\Http\Controllers\SPPTController::class, 'submit'])->name('submit-sppt');
Route::post('/submit-sppt-step1', [\App\Http\Controllers\SPPTController::class, 'submitStep1'])->name('submit-sppt-step1');

Route::post('/submit-skl', [\App\Http\Controllers\SKLController::class, 'submit'])->name('submit-skl');
Route::post('/submit-skl-step1', [\App\Http\Controllers\SKLController::class, 'submitStep1'])->name('submit-skl-step1');
