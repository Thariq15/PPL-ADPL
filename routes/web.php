<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GajiKaryawanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShifKerjaController;
use App\Http\Controllers\SupplierController;

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
    Route::get('/pemesanan/riwayat', [PemesananController::class, 'riwayat'])->name('kasir.riwayat');
    Route::get('/pemesanan/tambah', [PemesananController::class, 'add'])->name('kasir.add');
    Route::post('/pemesanan/update', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('kasir.store');
  });

  Route::prefix('absensi')->group(function () {
    Route::get('/', [AbsensiController::class, 'absen'])->name('absensi');
    Route::get('/add', [AbsensiController::class, 'add'])->name('absensi.add');
    Route::get('/tambah', [AbsensiController::class, 'addCaffe'])->name('absensi.add.caffe');
  });

  Route::prefix('shift')->group(function () {
    Route::get('/', [ShifKerjaController::class, 'index'])->name('shift');
    Route::get('/add', [ShifKerjaController::class, 'add'])->name('shift.add');
    Route::post('/store', [ShifKerjaController::class, 'store'])->name('shift.store');
    Route::get('/edit', [ShifKerjaController::class, 'edit'])->name('shift.edit');
    Route::post('/update', [ShifKerjaController::class, 'update'])->name('shift.update');
    Route::get('/delete/{id}', [ShifKerjaController::class, 'delete'])->name('shift.delete');
  });


  Route::prefix('supply')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supply');
    Route::get('/add', [SupplierController::class, 'add'])->name('supply.add');
    Route::post('/store', [SupplierController::class, 'store'])->name('supply.store');
    Route::get('/edit', [SupplierController::class, 'edit'])->name('supply.edit');
    Route::post('/update', [SupplierController::class, 'update'])->name('supply.update');
    Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('supply.delete');
  });


  Route::prefix('gaji')->group(function (){
    Route::get('/', [GajiKaryawanController::class, 'index'])->name('gaji');
    Route::get('/tambah', [GajiKaryawanController::class, 'create'])->name('gaji.add');
    Route::get('/edit/{id}', [GajiKaryawanController::class, 'edit'])->name('gaji.edit');
  });
  Route::prefix('detail')->group(function () {
    Route::post('/delete', [PemesananController::class, 'deleteDetail'])->name('dt.delete');
  });
});

require __DIR__ . '/auth.php';
