<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/profile', function () {
    return redirect('/my-profile');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

// Override Jetstream profile route
Route::get('/profile', function () {
    return view('profile.show');
})->middleware('auth')->name('profile.show');

Route::get('/home', function () {
    return redirect('/');
})->middleware('auth');

// Semua route resource dilindungi auth
Route::middleware(['auth'])->group(function () {
    Route::resource('perkiraan', App\Http\Controllers\PerkiraanController::class);
    Route::resource('jurnal', App\Http\Controllers\JurnalUmumController::class);
    Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
    Route::resource('pemasok', App\Http\Controllers\PemasokController::class);
    Route::resource('faktur_penjualan', App\Http\Controllers\FakturPenjualanController::class);
    Route::resource('faktur_pembelian', App\Http\Controllers\FakturPembelianController::class);
    Route::resource('pembayaran', App\Http\Controllers\PembayaranController::class);
    Route::resource('neraca_saldo', App\Http\Controllers\NeracaSaldoController::class);
    Route::resource('jurnal_detail', App\Http\Controllers\JurnalDetailController::class);
    Route::resource('buku_besar', App\Http\Controllers\BukuBesarController::class);
    Route::resource('saldo_akun', App\Http\Controllers\SaldoAkunController::class);
    Route::resource('laporan_keuangan', App\Http\Controllers\LaporanKeuanganController::class);

    Route::get('/my-profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password');
});