<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk halaman home
Route::get('/home', [PageController::class, 'home'])->name('home');

// Route untuk mengelola karyawan
Route::get('/daftar-karyawan', [PageController::class, 'daftarKaryawan'])->name('daftarKaryawan');
Route::get('/create-karyawan', [PageController::class, 'createKaryawan'])->name('createKaryawan');
Route::post('/store-karyawan', [PageController::class, 'storeKaryawan'])->name('storeKaryawan');
Route::get('/edit-karyawan/{id}', [PageController::class, 'editKaryawan'])->name('editKaryawan');
Route::post('/update-karyawan/{id}', [PageController::class, 'updateKaryawan'])->name('updateKaryawan');
Route::delete('/destroy-karyawan/{id}', [PageController::class, 'destroyKaryawan'])->name('destroyKaryawan');

// Route untuk mengelola perusahaan
Route::get('/daftar-perusahaan', [PageController::class, 'daftarPerusahaan'])->name('daftarPerusahaan');
Route::get('/create-perusahaan', [PageController::class, 'createPerusahaan'])->name('createPerusahaan');
Route::post('/store-perusahaan', [PageController::class, 'storePerusahaan'])->name('storePerusahaan');
Route::get('/edit-perusahaan/{id}', [PageController::class, 'editPerusahaan'])->name('editPerusahaan');
Route::post('/update-perusahaan/{id}', [PageController::class, 'updatePerusahaan'])->name('updatePerusahaan');
Route::delete('/destroy-perusahaan/{id}', [PageController::class, 'destroyPerusahaan'])->name('destroyPerusahaan');

Route::get('/sumberDana', [PageController::class, 'daftarSumberDana'])->name('sumberDana.index');
Route::get('/sumberDana/create', [PageController::class, 'createSumberDana'])->name('sumberDana.create');
Route::post('/sumberDana', [PageController::class, 'storeSumberDana'])->name('sumberDana.store');
Route::get('/sumberDana/{sumberDana}/edit', [PageController::class, 'editSumberDana'])->name('sumberDana.edit');
Route::put('/sumberDana/{sumberDana}', [PageController::class, 'updateSumberDana'])->name('sumberDana.update');
Route::delete('/sumberDana/{sumberDana}', [PageController::class, 'destroySumberDana'])->name('sumberDana.destroy');

Route::get('/sumberDana/create', [PageController::class, 'create'])->name('sumberDana.create');


// routes/api.php



Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [PageController::class, 'adminDashboard']);
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin
});

Route::middleware(['auth:api', 'role:admin_perusahaan'])->group(function () {
    Route::get('/perusahaan-dashboard', [PageController::class, 'perusahaanDashboard']);
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin perusahaan
});

Route::middleware(['auth:api', 'role:admin_bank'])->group(function () {
    Route::get('/bank-dashboard', [PageController::class, 'bankDashboard']);
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin bank
});
