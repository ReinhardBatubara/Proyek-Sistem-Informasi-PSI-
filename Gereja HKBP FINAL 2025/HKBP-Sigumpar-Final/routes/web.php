<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\WartaController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\LayananGerejaController;

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

// Route::get('/daftarjemaat', function () {
//     return view('halaman.daftarjemaat.admin.daftarjemaat');
// })->middleware(['auth', 'verified'])->name('daftarjemaat');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::get('/warta', [WartaController::class, 'index'])->name('warta');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/daftarjemaat', [JemaatController::class, 'daftarjemaat'])->name('admin.daftarjemaat');
//     Route::post('/admin/daftarjemaat', [JemaatController::class, 'storejemaat'])->name('admin.storejemaat');
//     Route::delete('/admin/daftarjemaat/{id}', [JemaatController::class, 'destroyjemaat'])->name('admin.destroyjemaat');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/daftarjemaat', [JemaatController::class, 'daftarjemaat'])->name('daftarjemaat');

    Route::get('/admin/daftarjemaat', [JemaatController::class, 'daftarjemaat'])->name('admin.daftarjemaat');

    Route::post('/admin/daftarjemaat', [JemaatController::class, 'storejemaat'])->name('admin.storejemaat');

    Route::delete('/admin/daftarjemaat/{id}', [JemaatController::class, 'destroyjemaat'])->name('admin.destroyjemaat');

    Route::put('/admin/daftarjemaat/{id}', [JemaatController::class, 'updatejemaat'])->name('admin.updatejemaat');

});



Route::middleware(['auth', 'role:admin'])->prefix('admin/layanan')->group(function () {
    Route::get('martuppol/create', [LayananGerejaController::class, 'createMartuppol'])->name('martuppol.create');
    Route::post('martuppol/store', [LayananGerejaController::class, 'storeMartuppol'])->name('martuppol.store');

    Route::get('naik-sidi/create', [LayananGerejaController::class, 'createNaikSidi'])->name('naik_sidi.create');
    Route::post('naik-sidi/store', [LayananGerejaController::class, 'storeNaikSidi'])->name('naik_sidi.store');

    Route::get('pernikahan/create', [LayananGerejaController::class, 'createPernikahan'])->name('pernikahan.create');
    Route::post('pernikahan/store', [LayananGerejaController::class, 'storePernikahan'])->name('pernikahan.store');

    Route::get('anak-lahir/create', [LayananGerejaController::class, 'createAnakLahir'])->name('anak_lahir.create');
    Route::post('anak-lahir/store', [LayananGerejaController::class, 'storeAnakLahir'])->name('anak_lahir.store');

    Route::get('jemaat-sakit/create', [LayananGerejaController::class, 'createJemaatSakit'])->name('jemaat_sakit.create');
    Route::post('jemaat-sakit/store', [LayananGerejaController::class, 'storeJemaatSakit'])->name('jemaat_sakit.store');

    Route::get('kunjungan-makam/create', [LayananGerejaController::class, 'createKunjunganMakam'])->name('kunjungan_makam.create');
    Route::post('kunjungan-makam/store', [LayananGerejaController::class, 'storeKunjunganMakam'])->name('kunjungan_makam.store');

    Route::get('orang-meninggal/create', [LayananGerejaController::class, 'createOrangMeninggal'])->name('orang_meninggal.create');
    Route::post('orang-meninggal/store', [LayananGerejaController::class, 'storeOrangMeninggal'])->name('orang_meninggal.store');
});
