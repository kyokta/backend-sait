<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PerkuliahanController;
use App\Http\Controllers\api\MahasiswaController;
use App\Http\Controllers\api\MatakuliahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// perkuliahan
Route::get('/perkuliahan', [PerkuliahanController::class, 'getAllData']);
Route::get('/perkuliahan/{nim}', [PerkuliahanController::class, 'getDataById']);
Route::get('/perkuliahan/{nim}/{kode_mk}', [PerkuliahanController::class, 'getDataByNimAndKodeMk']);
Route::post('/perkuliahan', [PerkuliahanController::class, 'createData']);
Route::put('/perkuliahan/{nim}/{kode_mk}', [PerkuliahanController::class, 'updateData']);
Route::get('/perkuliahan/delete/{nim}/{kode_mk}', [PerkuliahanController::class, 'deleteData']);

// mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'getAllData']);
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'getDataById']);
Route::post('/mahasiswa', [MahasiswaController::class, 'createData']);
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'updateData']);
Route::get('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'deleteData']);

// matakuliah
Route::get('/matakuliah', [MatakuliahController::class, 'getAllData']);
Route::get('/matakuliah/{kode_mk}', [MatakuliahController::class, 'getDataById']);
Route::post('/matakuliah', [MatakuliahController::class, 'createData']);
Route::put('/matakuliah/{kode_mk}', [MatakuliahController::class, 'updateData']);
Route::get('/matakuliah/delete/{kode_mk}', [MatakuliahController::class, 'deleteData']);
