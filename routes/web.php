<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuplayerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatPenjulanController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('login', [LoginController::class, 'index'])->name('login');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/authenticate', 'authenticate');
    Route::post('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function () {
    route::group(['middleware' => ['loginCheck:admin']], function () {
        Route::resource('users', UsersController::class);
        Route::resource('suplayers', SuplayerController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('barangs', BarangController::class);
        Route::resource('stock-in', StockInController::class);
        Route::resource('units', UnitController::class);
        Route::controller(CartController::class)->group(function() {
            Route::get('/pembayaran', 'index');
            Route::post('/insert-cart', 'insertCart');
            Route::post('/data-tmp', 'showCart');
            Route::post('/check-out', 'checkOut');
        });
        Route::controller(RiwayatPenjulanController::class)->group(function() {
            Route::get('/riwayat-penjualan', 'index');
            Route::post('/detail-transaksi', 'detailTransaksi');
        });
    });
});

