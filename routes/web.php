<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\DashboardPiketController;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\NilaiController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

//guest (sebelum login)
Route::middleware(['guest:admin'])->group(function(){
    Route::get('/admin', function(){return view('auth.loginadmin'); })->name('loginadmin');
    Route::post('/loginadmin', [AuthController::class, 'loginadmin']);
 });
 Route::middleware(['guest:guru'])->group(function(){
     Route::get('/guru', function(){return view('auth.loginguru'); })->name('loginguru');
     Route::post('/loginguru', [AuthController::class, 'loginguru']);
 });
 Route::middleware(['guest:piket'])->group(function(){
     Route::get('/piket', function(){return view('auth.loginpiket'); })->name('loginpiket');
     Route::post('/loginpiket', [AuthController::class, 'loginpiket']);
 });

 //auth (setelah login)
 Route::middleware(['auth:admin'])->group(function (){
     Route::get('/panel/dashboard', [DashboardAdminController::class, 'dashboard']);
     Route::get('/panel/logout', [AuthController::class, 'logoutadmin']);

     Route::resource('siswa', SiswaController::class);
     Route::resource('guru', GuruController::class);
     Route::resource('jurnal', JurnalController::class);
     Route::resource('rapor', NilaiController::class);
     Route::resource('nilai', NilaiController::class);
 });

 Route::middleware(['auth:guru'])->group(function (){
     Route::get('/guru/dashboard', [DashboardGuruController::class, 'dashboard']);
     Route::get('/guru/logout', [AuthController::class, 'logoutguru']);

     Route::resource('siswa', SiswaController::class);
     Route::resource('guru', GuruController::class);
     Route::resource('jurnal', JurnalController::class);
     Route::resource('rapor', NilaiController::class);
     Route::resource('nilai', NilaiController::class);
 });

 Route::middleware(['auth:piket'])->group(function (){
     Route::get('/piket/dashboard', [DashboardPiketController::class, 'dashboard']);
     Route::get('/piket/logout', [AuthController::class, 'logoutpiket']);

     Route::resource('siswa', SiswaController::class);
     Route::resource('guru', GuruController::class);
     Route::resource('jurnal', JurnalController::class);
     Route::resource('rapor', NilaiController::class);
     Route::resource('nilai', NilaiController::class);
 });
