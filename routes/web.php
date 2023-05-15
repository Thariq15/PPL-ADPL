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

// // About
// Route::get('/about', [AboutController::class, 'index']);

// // produk
// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// // kontak
// Route::get('/contact', [KontakController::class, 'index']);

// // login
// Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/auth/login', [AuthenticationController::class, 'create']);

// // register
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// // profile
// Route::get('/dashboard/profile/{user:id}', [ProfileController::class, 'index']);
// Route::post('/dashboard/profile/{user:id}', [ProfileController::class, 'update']);

// // dashboard/product
// Route::get('/dashboard/products', [ProductController::class, 'index']);
// Route::get('/dashboard/products/create', [ProductController::class, 'create']);
// Route::get('/dashboard/editproduct/{product:id}', [ProductController::class, 'edit']);
// Route::post('/dashboard/saveproduct', [ProductController::class, 'store']);
// Route::post('/dashboard/editproduct/{product:id}', [ProductController::class, 'update']);


Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');
});

require __DIR__ . '/auth.php';
