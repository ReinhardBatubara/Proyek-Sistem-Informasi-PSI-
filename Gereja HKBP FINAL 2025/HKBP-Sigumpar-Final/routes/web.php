<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\WartaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profilegereja', function () {
    return view('halaman.profilegereja.user.profilegereja');
})->middleware(['auth', 'verified'])->name('profilegereja');

Route::get('/jadwal', function () {
    return view('halaman.jadwalgereja.user.jadwal');
})->middleware(['auth', 'verified'])->name('jadwal');

Route::get('/warta', function () {
    return view('halaman.wartagereja.user.warta');
})->middleware(['auth', 'verified'])->name('warta');

Route::get('/layanan', function () {
    return view('halaman.layanangereja.layanan');
})->middleware(['auth', 'verified'])->name('layanan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::get('/warta', [WartaController::class, 'index'])->name('warta');

