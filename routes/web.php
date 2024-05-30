<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::get('/penjualan', [App\Http\Controllers\ProductController::class, 'index'])->name('penjualan');

Route::get('/penjualan/tambahobat', [App\Http\Controllers\ProductController::class, 'create'])->name('tambahobat');

Route::post('/penjualan/tambahobat', [App\Http\Controllers\ProductController::class, 'store'])->name('tambahobat');

Route::get('/penjualan/editobat/{productID}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editobat');

Route::post('/penjualan/editobat/{productID}', [App\Http\Controllers\ProductController::class, 'update'])->name('updateobat');

Route::get('/penjualan/hapusobat/{productID}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('hapusobat');

Route::get('/beli/{productID}', [App\Http\Controllers\HomeController::class, 'buy'])->name('beli');

Route::post('/beli/{productID}', [App\Http\Controllers\UserController::class, 'beli'])->name('beliproduk');

Route::get('/pembelian', [App\Http\Controllers\UserController::class, 'pembelian'])->name('pembelian');