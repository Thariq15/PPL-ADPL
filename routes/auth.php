<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  // login
  Route::get('login', [AuthenticationController::class, 'create'])->name('login');
  Route::post('login', [AuthenticationController::class, 'store']);

  // register
  Route::get('register', [RegistrationController::class, 'create'])->name('register');
  Route::post('register', [RegistrationController::class, 'store']);
});
