<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/daftarKaryawan', [PageController::class, 'daftarKaryawan']);
Route::get('/daftarPerusahaan', [PageController::class, 'daftarPerusahaan'])->name('daftarPerusahaan');

Route::get('/karyawan', [PageController::class, 'daftarKaryawan'])->name('karyawan.index');
Route::get('/karyawan/create', [PageController::class, 'createKaryawan'])->name('karyawan.create');
Route::post('/karyawan', [PageController::class, 'storeKaryawan'])->name('karyawan.store');
Route::get('/karyawan/{karyawan}/edit', [PageController::class, 'editKaryawan'])->name('karyawan.edit');
Route::put('karyawan/{karyawan}', [PageController::class, 'updateKaryawan'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [PageController::class, 'destroyKaryawan'])->name('karyawan.destroy');

Route::get('/perusahaan', [PageController::class, 'daftarPerusahaan'])->name('perusahaan.index');
Route::get('/perusahaan/create', [PageController::class, 'createPerusahaan'])->name('perusahaan.create');
Route::post('/perusahaan', [PageController::class, 'storePerusahaan'])->name('perusahaan.store');
Route::get('/perusahaan/{perusahaan}/edit', [PageController::class, 'editPerusahaan'])->name('perusahaan.edit');
Route::put('/perusahaan/{perusahaan}', [PageController::class, 'updatePerusahaan'])->name('perusahaan.update');
Route::delete('/perusahaan/{perusahaan}', [PageController::class, 'destroyPerusahaan'])->name('perusahaan.destroy');

// Tambahkan route untuk Sumber Dana
Route::get('/sumberDana', [PageController::class, 'daftarSumberDana'])->name('sumberDana.index');
Route::get('/sumberDana/create', [PageController::class, 'createSumberDana'])->name('sumberDana.create');
Route::post('/sumberDana', [PageController::class, 'storeSumberDana'])->name('sumberDana.store');

Route::get('/sumberDana/edit/{sumberDana}', [PageController::class, 'updateSumberDana'])->name('sumberDana.edit');
Route::put('/sumberDana/{sumberDana}', [PageController::class, 'updateSumberDana'])->name('sumberDana.update');
Route::delete('/sumberDana/{sumberDana}', [PageController::class, 'destroySumberDana'])->name('sumberDana.destroy');





Route::get('/login', [PageController::class, 'showLoginForm'])->name('login');

// Handle the login request (POST request to /login)
Route::post('/login', [PageController::class, 'login'])->name('login.submit');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [PageController::class, 'adminDashboard']);
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin
});

Route::middleware(['auth', 'role:admin_perusahaan'])->group(function () {
    Route::get('/perusahaan-dashboard', [PageController::class, 'perusahaanDashboard']);
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin perusahaan
});

Route::middleware(['auth', 'role:admin_bank'])->group(function () {
    Route::get('/bank-dashboard', [PageController::class, 'bankDashboard']);
    // Tambahkan route lainnya yang hanya bisa diakses oleh admin bank
});
Route::middleware(['web'])->group(function () {
    Auth::routes();
});

