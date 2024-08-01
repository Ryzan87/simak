<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\CalonMahasiswaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

/**
 * ! Jangan ubah route yang ada dalam group ini
 * */
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'checkToken')->name('check');
        Route::get('/logout', 'logout')->name('logout'); // gunakan untuk logout
        Route::get('/roles', 'changeUserRole')->middleware('auth.token');
    });

/**
 * ! Jadikan route di bawah sebagai halaman utama dari web
 * ! harap tidak mengubah nilai pada name();
 */
Route::middleware('auth.token')
    ->group(function () {
        Route::get('/home', [HomeController::class, 'home'])->name('home');
    });

/**
 * * Buat route-route baru di bawah ini
 * * Pastikan untuk selalu menggunakan middleware('auth.token')
 * * middleware tersebut digunakan untuk verifikasi access pengguna dengan web
 *
 * * Bisa juga ditambahkan dengan middleware lainnya.
 * * Berikut adalah beberapa middleware lain yang telah tersedia,
 * * dapat digunakan untuk mengatur akses route berdasarkan role user
 *
 * 1.) auth.admin -> biasa digunakan untuk akses route untuk manage user lain
 * 2.) auth.staff
 *
 * ? contoh penggunaan: middleware(['auth.token', 'auth.mahasiswa'])
 */

/**
 * Apabila telah menambahkan route baru tetapi tidak dapat diakses
 * buka terminal baru dan jalankan perintah 'php artisan optimize' tanpa tanda petik
 */

/**
 * Profile untuk semua role
 */
Route::controller(ProfileController::class)
    ->middleware('auth.token')
    ->group(function () {
        Route::get('/profile', 'index');
        Route::put('/profile', 'updateImage');
        Route::get('/password', 'password');
        Route::put('/password', 'updatePassword');
    });

/**
 * Kategori untuk semua role
 */
Route::controller(KategoriController::class)
    ->middleware('auth.token')
    ->group(function () {
        Route::get('/kategori', 'index')->name('kategori.index');
        Route::get('/kategori/create', 'create');
        Route::post('/kategori/save', 'save');
        Route::get('/kategori/edit/{id}', 'edit');
        Route::post('/kategori/update/{id}', 'update');
        Route::get('/kategori/delete/{id}', 'delete');
    });

/**
 * Data Calon Mahasiswa untuk semua role
 */
Route::controller(CalonMahasiswaController::class)
    ->middleware('auth.token')
    ->group(function () {
        Route::get('/calon-mahasiswa', 'index')->name('calon-mahasiswa.index');
        Route::get('/calon-mahasiswa/create', 'create');
        Route::post('/calon-mahasiswa/save', 'save');
        Route::get('/calon-mahasiswa/edit/{id}', 'edit');
        Route::post('/calon-mahasiswa/update/{id}', 'update');
        Route::get('/calon-mahasiswa/delete/{id}', 'delete');
    });

/**
 * Arsip untuk semua role
 *
 */
Route::controller(ArsipController::class)
    ->middleware('auth.token')
    ->group(function () {
        Route::get('/arsip', 'index')->name('arsip.index');
        Route::get('/arsip/create', 'create');
        Route::post('/arsip/save', 'save');
        Route::get('/arsip/edit/{id}', 'edit')->name('arsip.edit');
        Route::post('/arsip/update/{id}', 'update');
        Route::get('/arsip/delete/{id}', 'delete');
        Route::get('/arsip/preview/{id}', 'preview');
        Route::get('/arsip/download/{id}', 'download');
    });

/**
 * Staff untuk semua role
 */
Route::controller(StaffController::class)
    ->middleware(['auth.token', 'auth.admin'])
    ->group(function () {
        Route::get('/staff', 'index')->name('staff.index');
    });

/**
 * Riwayat Unduh untuk semua role
 */
Route::controller(RiwayatController::class)
    ->middleware(['auth.token'])
    ->group(function () {
        Route::get('/riwayat', 'index')->name('riwayat.index');
    });
