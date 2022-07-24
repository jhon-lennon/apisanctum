<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {

    Route::post('/register', [AuthController::class, 'createUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
});

Route::prefix('/user')->middleware('auth:sanctum')->group(function () {

    Route::get('/', [UserController::class, 'show']);
    Route::post('update', [UserController::class, 'update']);
    Route::get('delete', [UserController::class, 'delete']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::prefix('/posts')->group(function () {
        Route::get('/', [PostUserController::class, 'index']);
        Route::get('/{id}', [PostUserController::class, 'show']);
        Route::post('create', [PostUserController::class, 'create']);
        Route::post('update/{id}', [PostUserController::class, 'update']);
        Route::get('delete/{id}', [PostUserController::class, 'delete']);
    });
});
