<?php
namespace App\Modules\Chofer\Routes;

use App\Modules\Chofer\Controllers\ChoferController;
use Illuminate\Support\Facades\Route;

/* controlador de Choferes */
Route::get('/choferes', [ChoferController::class, 'index']);
Route::post('/choferes', [ChoferController::class, 'store']);
Route::get('/choferes/{id}', [ChoferController::class, 'show']);
Route::put('/choferes/{id}', [ChoferController::class, 'update']);
Route::delete('/choferes/{id}', [ChoferController::class, 'destroy']);

Route::get('/test', [ChoferController::class, 'test']);

?>