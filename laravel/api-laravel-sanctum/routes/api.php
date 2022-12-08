<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BookApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::get('user', function(Request $request) {
        return $request->user();
    });
    Route::get('book/', [BookApiController::class, 'index']);
    Route::post('create/', [BookApiController::class, 'store']);
    Route::post('update/', [BookApiController::class, 'update']);
    Route::get('book/{id}/', [BookApiController::class, 'show']);
    Route::delete('delete/{id}/', [BookApiController::class, 'destroy']);
});
