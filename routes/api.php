<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarcoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'],function (){
    Route::post('signup', [AuthController::class, 'signup']);  //registro usuario
    Route::post('login', [AuthController::class, 'login']);  //login usuario
});

Route::group(['prefix' => 'barco'],function (){
    Route::get('/', [BarcoController::class, 'getBarcos']);  //obtener todos los  barcos registrados
    Route::post('potsBarco', [BarcoController::class, 'potsBarco']);  //insertar barco
    Route::put('{id}', [BarcoController::class, 'updatedBarco']);  //Actualizar barco
    Route::delete('{id}/delete', [BarcoController::class, 'destroyBarco']);  //eliminar barco
    Route::get('oficinas', [BarcoController::class, 'getOficinas']);  //obtener listado de oficinas
    Route::post('orden', [BarcoController::class, 'potsOrden']);  //obtener listado de oficinas
});

Route::group(['prefix' => 'oficina'],function (){
    Route::get('/', [BarcoController::class, 'getOficinas']);  //obtener listado de oficinas
});