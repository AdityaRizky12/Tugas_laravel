<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurnalController;

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

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk fitur rekening
Route::get('/rekening', [RekeningController::class, 'index'])->name('rekening');
Route::get('/daftar', [RekeningController::class, 'daftar'])->name('daftar');
//Route::post('/proses', [RekeningController::class, 'simpanRek']);
Route::get('/tampilanRek', [RekeningController::class, 'tampilanRek']);
Route::get('/rekening', [RekeningController::class, 'index']);
Route::get('/jurnal', [JurnalController::class, 'index']);
Route::post('/simpanrekening', [RekeningController::class, 'simpanRek']);
Route::post('/updaterekening', [RekeningController::class, 'updateRek']);
Route::post('/deleteRekening', [RekeningController::class, 'deleteRek']);
Route::get('/Addjurnal', [JurnalController::class, 'Addjurnal']);


//Rute autentikasi
Auth::routes();

// Dashboard (menggunakan HomeController)
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Rute home (juga mengarah ke dashboard jika perlu)
Route::get('/home', [HomeController::class, 'index'])->name('home');
