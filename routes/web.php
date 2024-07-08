<?php

use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\SiklusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StandarController;
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

//Auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Single Menu
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

//Menu Master Data
Route::get('fakultas', [FakultasController::class, 'index'])->name('fakultas.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/fakultas/search', [FakultasController::class, 'search'])->name('fakultas.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/fakultas/create', [FakultasController::class, 'create'])->name('fakultas.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/fakultas/{id}/updateActive', [FakultasController::class, 'updateActive'])->name('fakultas.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/fakultas/get_data/{id}', [FakultasController::class, 'get_data'])->name('fakultas.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/fakultas/{id}/update', [FakultasController::class, 'update'])->name('fakultas.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/fakultas/{id}/delete', [FakultasController::class, 'delete'])->name('fakultas.delete')->middleware('auth', 'CheckHakAkses:Admin');

Route::get('users', [UsersController::class, 'index'])->name('users.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/users/search', [UsersController::class, 'search'])->name('users.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/users/create', [UsersController::class, 'create'])->name('users.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/users/{id}/updateActive', [UsersController::class, 'updateActive'])->name('users.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/users/get_data/{id}', [UsersController::class, 'get_data'])->name('users.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/users/{id}/update', [UsersController::class, 'update'])->name('users.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete')->middleware('auth', 'CheckHakAkses:Admin');

Route::get('siklus', [SiklusController::class, 'index'])->name('siklus.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/siklus/search', [SiklusController::class, 'search'])->name('siklus.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/siklus/create', [SiklusController::class, 'create'])->name('siklus.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/siklus/{id}/updateActive', [SiklusController::class, 'updateActive'])->name('siklus.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/siklus/get_data/{id}', [SiklusController::class, 'get_data'])->name('siklus.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/siklus/{id}/update', [SiklusController::class, 'update'])->name('siklus.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/siklus/{id}/delete', [SiklusController::class, 'delete'])->name('siklus.delete')->middleware('auth', 'CheckHakAkses:Admin');

Route::get('standar', [StandarController::class, 'index'])->name('standar.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/standar/search', [StandarController::class, 'search'])->name('standar.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/standar/create', [StandarController::class, 'create'])->name('standar.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/standar/{id}/updateActive', [StandarController::class, 'updateActive'])->name('standar.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/standar/get_data/{id}', [StandarController::class, 'get_data'])->name('standar.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/standar/{id}/update', [StandarController::class, 'update'])->name('standar.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/standar/{id}/delete', [StandarController::class, 'delete'])->name('standar.delete')->middleware('auth', 'CheckHakAkses:Admin');

Route::get('indikator', [IndikatorController::class, 'index'])->name('indikator.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/indikator/search', [IndikatorController::class, 'search'])->name('indikator.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/indikator/create', [IndikatorController::class, 'create'])->name('indikator.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/indikator/{id}/updateActive', [IndikatorController::class, 'updateActive'])->name('indikator.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/indikator/get_data/{id}', [IndikatorController::class, 'get_data'])->name('indikator.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/indikator/{id}/update', [IndikatorController::class, 'update'])->name('indikator.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/indikator/{id}/delete', [IndikatorController::class, 'delete'])->name('indikator.delete')->middleware('auth', 'CheckHakAkses:Admin');