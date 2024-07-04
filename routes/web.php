<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckHakAkses;

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


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('users', [UsersController::class, 'index'])->name('users.index')->middleware('auth' ,'CheckHakAkses:admin');
Route::get('/users/search', [UsersController::class, 'search'])->name('users.search')->middleware('auth','CheckHakAkses:admin');
Route::post('/users/create', [UsersController::class, 'create'])->name('users.create')->middleware('auth','CheckHakAkses:admin');
Route::put('/users/{id}/updateActive', [UsersController::class, 'updateActive'])->name('users.updateActive')->middleware('auth','CheckHakAkses:admin');
Route::get('/users/get_data/{id}', [UsersController::class, 'get_data'])->name('users.get_data')->middleware('auth','CheckHakAkses:admin');
Route::put('/users/{id}/update', [UsersController::class, 'update'])->name('users.update')->middleware('auth', 'CheckHakAkses:admin');