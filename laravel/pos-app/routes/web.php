<?php

use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\BarangKeluar\BarangKeluarController;
use App\Http\Controllers\Kategori\KategoriController;
use Illuminate\Support\Facades\Route;

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

//barang masuk
Route::get('/barang', [BarangController::class, 'index'])->name('barang.masuk');
Route::post('/barang/create', [BarangController::class, 'store'])->name('barang.create');
Route::get('/barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::post('/barang/{id}/delete', [BarangController::class, 'destroy'])->name('barang.destroy');

//barang keluar
Route::get('/keluar', [BarangKeluarController::class, 'index'])->name('barang.keluar');
Route::get('/keluar/create', [BarangKeluarController::class, 'create'])->name('keluar.create');
Route::post('/keluar/create/post', [BarangKeluarController::class, 'store'])->name('keluar.post');
Route::get('/keluar/{id}', [BarangKeluarController::class, 'edit'])->name('keluar.edit');
Route::post('/keluar/edit/{id}/update', [BarangKeluarController::class, 'update'])->name('keluar.update');
Route::delete('/keluar/delete/{id}', [BarangKeluarController::class, 'destroy'])->name('keluar.delete');

//kategori barang
Route::post('/kategori/post', [KategoriController::class, 'store'])->name('kategori.post');
