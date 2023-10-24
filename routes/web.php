<?php

use App\Http\Controllers\CaminhaoController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\CarretaController;
use App\Http\Controllers\FreteController;
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
    return redirect('/fretes');
});

Route::get('/fretes', [FreteController::class, 'index']);
Route::get('/fretes/criar', [FreteController::class, 'create']);
Route::post('/fretes/salvar', [FreteController::class, 'store']);
Route::get('/fretes/editar/{id}', [FreteController::class, 'edit']);
Route::delete('/fretes/deletar/{id}', [FreteController::class, 'destroy']);
Route::put('/fretes/atualizar/{id}', [FreteController::class, 'update']);

Route::get('/caminhoes', [CaminhaoController::class, 'index']);
Route::get('/caminhoes/criar', [CaminhaoController::class, 'create']);
Route::post('/caminhoes/salvar', [CaminhaoController::class, 'store']);
Route::get('/caminhoes/editar/{id}', [CaminhaoController::class, 'edit']);
Route::delete('/caminhoes/deletar/{id}', [CaminhaoController::class, 'destroy']);
Route::put('/caminhoes/atualizar/{id}', [CaminhaoController::class, 'update']);

Route::get('/cargas',[CargaController::class, 'index']);
Route::get('/cargas/criar',[CargaController::class, 'create']);
Route::post('/cargas/salvar',[CargaController::class, 'store']);
Route::get('/cargas/editar/{id}',[CargaController::class, 'edit']);
Route::delete('/cargas/deletar/{id}',[CargaController::class, 'destroy']);
Route::put('/cargas/atualizar/{id}',[CargaController::class, 'update']);

Route::get('/carretas',[CarretaController::class, 'index']);
Route::get('/carretas/criar',[CarretaController::class, 'create']);
Route::post('/carretas/salvar',[CarretaController::class,'store']);
Route::get('/carretas/editar/{id}',[CarretaController::class, 'edit']);
Route::delete('/carretas/deletar/{id}',[CarretaController::class, 'destroy']);
Route::put('/carretas/atualizar/{id}',[CarretaController::class, 'update']);

Route::get('/motoristas',[MotoristaController::class, 'index']);
Route::get('/motoristas/criar',[MotoristaController::class, 'create']);
Route::post('/motoristas/salvar',[MotoristaController::class, 'store']);
Route::get('/motoristas/editar/{id}',[MotoristaController::class, 'edit']);
Route::delete('/motoristas/deletar/{id}',[MotoristaController::class, 'destroy']);
Route::put('/motoristas/atualizar/{id}',[MotoristaController::class, 'update']);



