<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BahanMasukController;
use App\Http\Controllers\BahanKeluarController;
use App\Http\Controllers\CetakBahanMasukController;
use App\Http\Controllers\CetakBahanKeluarController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::middleware('CheckRole:admin')->group(function () {
        Route::get('/data-petugas', [PetugasController::class, 'index'])->name('data-petugas.index');
        Route::post('/data-petugas', [PetugasController::class, 'store'])->name('data-petugas.store');
        Route::get('/data-petugas/{id}', [PetugasController::class, 'edit'])->name('data-petugas.edit');
        Route::put('/data-petugas/{id}', [PetugasController::class, 'update'])->name('data-petugas.update');
        Route::delete('/data-petugas/{id}', [PetugasController::class, 'destroy'])->name('data-petugas.destroy');
        Route::get('/data-petugas-search', [PetugasController::class, 'search'])->name('data-petugas-search');


        Route::get('/cetak-bahan-masuk', [CetakBahanMasukController::class, 'index'])->name('cetak-bahan-masuk');
        Route::get('/cetak-masuk-pdf', [CetakBahanMasukController::class, 'printPdf'])->name('cetak-masuk-pdf');

        Route::get('/cetak-bahan-keluar', [CetakBahanKeluarController::class, 'index'])->name('cetak-bahan-keluar');
        Route::get('/cetak-keluar-pdf', [CetakBahanKeluarController::class, 'printPdf'])->name('cetak-keluar-pdf');
    });

    Route::middleware('CheckRole:petugas')->group(function () {

        Route::get('/data-bahan', [BahanController::class, 'index'])->name('data-bahan');
        Route::post('/data-bahan', [BahanController::class, 'store'])->name('data-bahan.store');
        Route::get('/data-bahan/{id}', [BahanController::class, 'edit'])->name('data-bahan.edit');
        Route::put('/data-bahan/{id}', [BahanController::class, 'update'])->name('data-bahan.update');
        Route::delete('/data-bahan/{id}', [BahanController::class, 'destroy'])->name('data-bahan.destroy');
        Route::get('/data-bahan-search', [BahanController::class, 'search'])->name('data-bahan-search');


        Route::get('/data-supplier', [SupplierController::class, 'index'])->name('data-supplier');
        Route::post('/data-supplier', [SupplierController::class, 'store'])->name('data-supplier.store');
        Route::get('/data-supplier/{id}', [SupplierController::class, 'edit'])->name('data-supplier.edit');
        Route::put('/data-supplier/{id}', [SupplierController::class, 'update'])->name('data-supplier.update');
        Route::delete('/data-supplier/{id}', [SupplierController::class, 'destroy'])->name('data-supplier.destroy');
        Route::get('/data-supplier-search', [SupplierController::class, 'search'])->name('data-supplier-search');


        Route::get('/bahan-masuk', [BahanMasukController::class, 'index'])->name('bahan-masuk');
        Route::post('/bahan-masuk', [BahanMasukController::class, 'store' ])->name('bahan-masuk.store');
        Route::get('/get-nama-bahan/{kode_bahan}', [BahanMasukController::class, 'getNamaBahan']);

        Route::get('/bahan-keluar', [BahanKeluarController::class, 'index'])->name('bahan-keluar');
        Route::post('/bahan-keluar', [BahanKeluarController::class, 'store'])->name('bahan-keluar.store');
        Route::get('/get-nama-jumlah-bahan/{kode_bahan}', [BahanKeluarController::class, 'getNamaJumlahBahan']);

        Route::delete('/bahan-kadaluarsa/{id}', [DashboardController::class, 'destroy'])->name('bahan-kadaluarsa.destroy');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::fallback([DashboardController::class, 'index']);
});
