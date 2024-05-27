<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('app.home');
})->name('home');

Route::get('/beranda', function () {
    return view('welcome');
})->name('welcome');

Route::get('/logindulukuy', function () {
    return view('layout.login');
})->name('login');

Route::get('/daftardulubang', function () {
    return view('layout.register');
})->name('register');

Route::post('/logindulukuy', [App\Http\Controllers\UserController::class, 'login'])->name('logindulukuy');

Route::post('/daftardulubang', [App\Http\Controllers\UserController::class, 'register'])->name('daftardulubang');

// buat route logout dengan fitur laravel tanpa controller
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/profile', [App\Http\Controllers\UserMasterController::class, 'index'])->name('profile');

Route::post('/profile', [App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::post('/profileupdatepassword', [App\Http\Controllers\UserController::class, 'update_password'])->name('updatePassword');

Route::post('/profileupdate', [App\Http\Controllers\UserMasterController::class, 'create'])->name('create');

Route::post('/profilemaster', [App\Http\Controllers\UserMasterController::class, 'update'])->name('update-master');

Route::get('/pembelian', function () {
    return view('app.dashboard.pembelian');
})->name('pembelian');

Route::get('/penjualan', function () {
    return view('app.dashboard.penjualan');
})->name('penjualan');