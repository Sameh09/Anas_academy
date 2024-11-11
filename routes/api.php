<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\verfiyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware' => verfiyToken::class], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('create', [ProductController::class, 'create']);

    Route::post('index', [ProductController::class, 'index']);
    Route::post('view', [ProductController::class, 'view']);
    Route::post('update', [ProductController::class, 'update']);
    Route::post('delete', [ProductController::class, 'delete']);
});
