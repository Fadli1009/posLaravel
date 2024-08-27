<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'funcLogin'])->name('login.function');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboarController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductsController::class);
    Route::resource('penjualan', TransactionController::class);
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('get-products/{category_id}', [TransactionController::class, 'getProducts']);
    Route::get('get-productsbyId/{product_id}', [TransactionController::class, 'getProductById']);
    Route::get('print', [TransactionController::class, 'print'])n   ;
});
Route::fallback(function () {
    return view('404-code');
});