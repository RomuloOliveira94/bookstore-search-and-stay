<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Book\BookController;
use App\Http\Controllers\Api\V1\Relations\BookStoreController;
use App\Http\Controllers\Api\V1\Store\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [LogoutController::class, 'logout']);
        Route::apiResource('/books', BookController::class);
        Route::apiResource('/stores' , StoreController::class);
        Route::post('/books/{book}/stores/{store}', [BookStoreController::class, 'store']);
        Route::put('/books/{book}/stores/{store}', [BookStoreController::class, 'update']);
        Route::delete('/books/{book}/stores/{store}', [BookStoreController::class, 'destroy']);
    });
});
