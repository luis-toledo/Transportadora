<?php

use App\Http\Controllers\CaminhaoController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\CarretaController;
use App\Http\Controllers\MotoristaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/caminhoes', [CaminhaoController::class, 'index']);
Route::get('/caminhoes/criar', [CaminhaoController::class, 'create']);
Route::post('/caminhoes/salvar', [CaminhaoController::class, 'store']);

Route::get('/cargas',[CargaController::class, 'index']);
Route::get('/cargas/criar',[CargaController::class, 'create']);
Route::post('/cargas/salvar',[CargaController::class, 'store']);

Route::get('/carretas',[CarretaController::class, 'index']);
Route::get('/carretas/criar',[CarretaController::class, 'create']);
Route::post('/carretas/salvar',[CarretaController::class,'store']);

Route::get('/motoristas',[MotoristaController::class, 'index']);
Route::get('/motoristas/criar',[MotoristaController::class, 'create']);
Route::post('/motoristas/salvar',[MotoristaController::class, 'store']);




