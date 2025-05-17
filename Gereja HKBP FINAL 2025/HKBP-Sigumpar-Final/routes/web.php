<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\WartaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('halaman.berandagereja.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profilegereja', function () {
    return view('halaman.profilegereja.admin.profilegereja');
})->middleware(['auth', 'verified'])->name('profilegereja');

Route::get('/jadwal', function () {
    return view('halaman.jadwalgereja.admin.jadwal');
})->middleware(['auth', 'verified'])->name('jadwal');

Route::get('/warta', function () {
    return view('halaman.wartagereja.admin.warta');
})->middleware(['auth', 'verified'])->name('warta');

Route::get('/layanan', function () {
    return view('halaman.layanangereja.admin.layanan');
})->middleware(['auth', 'verified'])->name('layanan');

Route::get('/pemberitahuan', function () {
    return view('halaman.pemberitahuan.admin.pemberitahuan');
})->middleware(['auth', 'verified'])->name('pemberitahuan');

Route::get('/daftarjemaat', function () {
    return view('halaman.daftarjemaat.admin.daftarjemaat');
})->middleware(['auth', 'verified'])->name('daftarjemaat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::get('/warta', [WartaController::class, 'index'])->name('warta');

