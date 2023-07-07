<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\UsuarioSistemaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* controlador de Choferes 
Route::get('/choferes', [ChoferController::class, 'index']);
Route::post('/choferes', [ChoferController::class, 'store']);
Route::get('/choferes/{id}', [ChoferController::class, 'show']);
Route::put('/choferes/{id}', [ChoferController::class, 'update']);
Route::delete('/choferes/{id}', [ChoferController::class, 'destroy']);*/
 
 

/* controlador choferes */
/* Route::resource('choferes', ChoferController::class )->only('store','show','destroy','index','update');
 */


/* UsuarioSistema */
Route::get('/users', [UsuarioSistemaController::class, 'index']);