<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home
Route::get('/', [HomeController::class, 'index']);


// log out
Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');

  // product
  Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'update'])->name('product.update');
  });
  // menu
  Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menu');
    Route::get('/add', [MenuController::class, 'add'])->name('menu.add');
    Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/update', [MenuController::class, 'update'])->name('menu.update');
    Route::get('/supply', [MenuController::class, 'supply'])->name('menu.supply');
  });


  Route::prefix('kasir')->group(function () {
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('kasir');
  });
});

require __DIR__ . '/auth.php';
