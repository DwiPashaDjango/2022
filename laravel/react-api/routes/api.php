<?php

use App\Http\Controllers\Api\AuthApi;
use App\Http\Controllers\Api\DosenApi;
use App\Http\Controllers\Api\MhsApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthApi::class, 'register']);
Route::post('login', [AuthApi::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    // admin
    Route::post('logout', [AuthApi::class, 'logout']);
    Route::get('user', function(Request $request) {
        return $request->user();
    });
    // mhs
    Route::get('mhs', [MhsApi::class, 'mhs']);
    Route::post('create', [MhsApi::class, 'store']);
    Route::get('mhs/{id}', [MhsApi::class, 'show']);
    Route::put('mhs/update/{id}', [MhsApi::class, 'update']);
    Route::delete('delete/{id}', [MhsApi::class, 'destroy']);
    Route::get('mhs/search/{name}', [MhsApi::class, 'search']);
    // dosen
    Route::get('dosen', [DosenApi::class, 'dosen']);
    Route::post('create/dosen', [DosenApi::class, 'store']);
    Route::get('dosen/{id}', [DosenApi::class, 'show']);
    Route::put('dosen/update/{id}', [DosenApi::class, 'update']);
    Route::delete('dosen/delete/{id}', [DosenApi::class, 'destroy']);
    Route::get('dosen/search/{name}', [DosenApi::class, 'search']);
});