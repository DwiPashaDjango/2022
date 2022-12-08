<?php

use App\Http\Controllers\Kasir\OrderController;
use App\Http\Controllers\Kasir\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome.kasir');
Route::get('/order', [OrderController::class, 'index'])->name('order.kasir');
Route::post('/order/check', [OrderController::class, 'store'])->name('order.store');
Route::delete('/order/delete_p/{id}', [OrderController::class, 'destroy'])->name('order.delete');
Route::get('/order/{id}/print_p', [OrderController::class, 'print'])->name('order.print');
