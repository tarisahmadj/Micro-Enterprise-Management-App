<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UsahaController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
  // Landing page
  Route::get('/', [LandingPageController::class, 'index']);

  // Authentication page
  Route::get('/login', [AuthController::class, 'index']);
  Route::post('/authenticate', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
  // Logout
  Route::post('/logout', [AuthController::class, 'logout']);
  
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  // usaha yang ada
  Route::get('/usaha', [UsahaController::class, 'usaha'])->name('usaha yang ada');
});