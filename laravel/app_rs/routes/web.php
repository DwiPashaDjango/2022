<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Staff;
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
// Dashboard
// Route::get('/dashboard', function () {
//     return view('pages.dashboard-general-dashboard', []);
// });

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->name('dsb');
Route::get('/staff', [Staff::class, 'index'])->name('stf');
Route::get('/staff/json', [Staff::class, 'jsonUser']);
Route::post('/add', [Staff::class, 'store']);