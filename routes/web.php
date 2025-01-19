<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\Backend\clientController;
use App\Http\Controllers\Backend\serviceController;
use App\Http\Controllers\Backend\blogController;
use App\Http\Controllers\Backend\testimonialController;

use Illuminate\Support\Facades\Route;

// Route untuk halaman welcome

Route::get('/', [FrontendController::class, 'index'])->name('frontend');
// Route::get('/', function () {
//     return view('frontend');
// });

// Route untuk menyimpan data kontak
Route::post('/contactadd', [FrontendController::class, 'store'])->name('contactadd.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profil pengguna (hanya untuk pengguna yang terautentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk admin (dengan middleware 'auth' dan 'admin')
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('clients', clientController::class);
    Route::resource('services', serviceController::class);
    Route::resource('blogs', blogController::class);
    Route::resource('testimonials', testimonialController::class);
});

// Tambahkan file auth.php untuk autentikasi
require __DIR__ . '/auth.php';

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

// if (App::environment('production')) {
//     URL::forceScheme('https');
// }