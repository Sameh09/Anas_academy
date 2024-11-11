<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\LogRequestMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/','home')->name('home');
Route::get('test/{value?}',[HomeController::class,'test'])->name('test');
Route::get('log_middleware',[HomeController::class,'log_request'])->name('log_request')->middleware([LogRequestMiddleware::class]);
Route::get('logout',[HomeController::class,'logout'])->name('logout');

//auth
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
