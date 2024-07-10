<?php

use App\Http\Controllers\AudityController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\SiklusController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\VisitasiController;
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
Route::get('institusi', [FakultasController::class, 'index'])->name('fakultas.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/institusi/search', [FakultasController::class, 'search'])->name('fakultas.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/institusi/create', [FakultasController::class, 'create'])->name('fakultas.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/institusi/{id}/updateActive', [FakultasController::class, 'updateActive'])->name('fakultas.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/institusi/get_data/{id}', [FakultasController::class, 'get_data'])->name('fakultas.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/institusi/{id}/update', [FakultasController::class, 'update'])->name('fakultas.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/institusi/{id}/delete', [FakultasController::class, 'delete'])->name('fakultas.delete')->middleware('auth', 'CheckHakAkses:Admin');

Route::get('akun', [UsersController::class, 'index'])->name('akun.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/akun/search', [UsersController::class, 'search'])->name('akun.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/akun/create', [UsersController::class, 'create'])->name('akun.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/akun/{id}/updateActive', [UsersController::class, 'updateActive'])->name('akun.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/akun/get_data/{id}', [UsersController::class, 'get_data'])->name('akun.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/akun/{id}/update', [UsersController::class, 'update'])->name('akun.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/akun/{id}/delete', [UsersController::class, 'delete'])->name('akun.delete')->middleware('auth', 'CheckHakAkses:Admin');

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

Route::get('audity', [AudityController::class, 'index'])->name('audity.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/audity/search', [AudityController::class, 'search'])->name('audity.search')->middleware('auth','CheckHakAkses:Admin');
Route::post('/audity/create', [AudityController::class, 'create'])->name('audity.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/audity/{id}/updateActive', [AudityController::class, 'updateActive'])->name('audity.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/audity/get_data/{id}', [AudityController::class, 'get_data'])->name('audity.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/audity/{id}/update', [AudityController::class, 'update'])->name('audity.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/audity/{id}/delete', [AudityController::class, 'delete'])->name('audity.delete')->middleware('auth', 'CheckHakAkses:Admin');

Route::get('indikator', [IndikatorController::class, 'index'])->name('indikator.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/indikator/search', [IndikatorController::class, 'search'])->name('indikator.search')->middleware('auth','CheckHakAkses:Admin');
Route::get('/indikator/searchSelect', [IndikatorController::class, 'searchSelect'])->name('indikator.searchSelect')->middleware('auth','CheckHakAkses:Admin');
Route::post('/indikator/create', [IndikatorController::class, 'create'])->name('indikator.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/indikator/{id}/updateActive', [IndikatorController::class, 'updateActive'])->name('indikator.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/indikator/get_data/{id}', [IndikatorController::class, 'get_data'])->name('indikator.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/indikator/{id}/update', [IndikatorController::class, 'update'])->name('indikator.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/indikator/{id}/delete', [IndikatorController::class, 'delete'])->name('indikator.delete')->middleware('auth', 'CheckHakAkses:Admin');
Route::post('/indikator/import',[IndikatorController::class, 'import'])->name('indikator.import');

Route::get('target', [TargetController::class, 'index'])->name('target.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/target/search', [TargetController::class, 'search'])->name('target.search')->middleware('auth','CheckHakAkses:Admin');
Route::get('/target/searchSelectAudity', [TargetController::class, 'searchSelectAudity'])->name('target.searchSelectAudity')->middleware('auth','CheckHakAkses:Admin');
Route::get('/target/searchSelectIndikator', [TargetController::class, 'searchSelectIndikator'])->name('target.searchSelectIndikator')->middleware('auth','CheckHakAkses:Admin');
Route::post('/target/create', [TargetController::class, 'create'])->name('target.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/target/{id}/updateActive', [TargetController::class, 'updateActive'])->name('target.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/target/get_data/{id}', [TargetController::class, 'get_data'])->name('target.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/target/{id}/update', [TargetController::class, 'update'])->name('target.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/target/{id}/delete', [TargetController::class, 'delete'])->name('target.delete')->middleware('auth', 'CheckHakAkses:Admin');
Route::post('/target/import',[TargetController::class, 'import'])->name('target.import');

Route::get('pengukuran', [PengukuranController::class, 'index'])->name('pengukuran.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/pengukuran/search', [PengukuranController::class, 'search'])->name('pengukuran.search')->middleware('auth','CheckHakAkses:Admin');
Route::get('/pengukuran/searchSelectAudity', [PengukuranController::class, 'searchSelectAudity'])->name('pengukuran.searchSelectAudity')->middleware('auth','CheckHakAkses:Admin');
Route::get('/pengukuran/searchSelectIndikator', [PengukuranController::class, 'searchSelectIndikator'])->name('pengukuran.searchSelectIndikator')->middleware('auth','CheckHakAkses:Admin');
Route::post('/pengukuran/create', [PengukuranController::class, 'create'])->name('pengukuran.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/pengukuran/{id}/updateActive', [PengukuranController::class, 'updateActive'])->name('pengukuran.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/pengukuran/get_data/{id}', [PengukuranController::class, 'get_data'])->name('pengukuran.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/pengukuran/{id}/update', [PengukuranController::class, 'update'])->name('pengukuran.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/pengukuran/{id}/delete', [PengukuranController::class, 'delete'])->name('pengukuran.delete')->middleware('auth', 'CheckHakAkses:Admin');
Route::post('/pengukuran/import',[PengukuranController::class, 'import'])->name('pengukuran.import');

Route::get('visitasi', [VisitasiController::class, 'index'])->name('visitasi.index')->middleware('auth' ,'CheckHakAkses:Admin');
Route::get('/visitasi/search', [VisitasiController::class, 'search'])->name('visitasi.search')->middleware('auth','CheckHakAkses:Admin');
Route::get('/visitasi/searchSelectAudity', [VisitasiController::class, 'searchSelectAudity'])->name('visitasi.searchSelectAudity')->middleware('auth','CheckHakAkses:Admin');
Route::get('/visitasi/searchSelectIndikator', [VisitasiController::class, 'searchSelectIndikator'])->name('visitasi.searchSelectIndikator')->middleware('auth','CheckHakAkses:Admin');
Route::post('/visitasi/create', [VisitasiController::class, 'create'])->name('visitasi.create')->middleware('auth','CheckHakAkses:Admin');
Route::put('/visitasi/{id}/updateActive', [VisitasiController::class, 'updateActive'])->name('visitasi.updateActive')->middleware('auth','CheckHakAkses:Admin');
Route::get('/visitasi/get_data/{id}', [VisitasiController::class, 'get_data'])->name('visitasi.get_data')->middleware('auth','CheckHakAkses:Admin');
Route::put('/visitasi/{id}/update', [VisitasiController::class, 'update'])->name('visitasi.update')->middleware('auth', 'CheckHakAkses:Admin');
Route::get('/visitasi/{id}/delete', [VisitasiController::class, 'delete'])->name('visitasi.delete')->middleware('auth', 'CheckHakAkses:Admin');