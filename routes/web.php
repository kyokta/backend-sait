<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerkuliahanController;
use App\Http\Controllers\MahasiswaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PerkuliahanController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'createMahasiswa'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'storeMahasiswa'])->name('mahasiswa.store');
