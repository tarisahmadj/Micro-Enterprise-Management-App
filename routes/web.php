<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\UsahausulanController;
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
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/authenticate', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
  // Logout
  Route::post('/logout', [AuthController::class, 'logout']);
  
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  // Update Profile
  Route::get('/akun', [DashboardController::class, 'edit']);
  Route::put('/akun/{id}', [DashboardController::class, 'update']);
  
  // usaha yang ada
  // Route::get('/usaha/create', [UsahaController::class, 'usaha'])->name('usaha');
  Route::resource('/usaha', UsahaController::class);
  Route::get('/searchUsaha', [UsahaController::class, 'searchUsaha']);
  
  //Usaha Usulan
  Route::resource('/usulusaha', UsahausulanController::class);
  Route::get('/searchUsulan', [UsahaController::class, 'searchUsulan']);

  Route::get('/files/download/{fileId}', [DashboardController::class,'getDownload']);
  Route::get('/verif/{id}', [DashboardController::class,'getVerif']);
  Route::get('/tolak/{id}', [DashboardController::class,'getTolak']);
});