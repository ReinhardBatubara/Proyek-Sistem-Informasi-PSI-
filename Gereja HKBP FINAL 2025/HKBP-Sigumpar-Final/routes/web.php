<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\WartaController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\LayananGerejaController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EventController::class, 'events'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::get('/warta', [WartaController::class, 'index'])->name('warta');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventController::class);
});


// Route::middleware(['auth', 'verified'])->group(function() {
//     Route::get('/layanan', [LayananGerejaController::class, 'index'])->name('layanan.index');
//     Route::get('/layanan/create', [LayananGerejaController::class, 'create'])->name('layanan.create');
//     Route::post('/layanan', [LayananGerejaController::class, 'store'])->name('layanan.store');
// });

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/layanangereja', [LayananGerejaController::class, 'index'])->name('layanangereja.index');
    Route::get('/layanangereja/create', [LayananGerejaController::class, 'create'])->name('layanangereja.create');
    Route::post('/layanangereja', [LayananGerejaController::class, 'store'])->name('layanangereja.store');
});