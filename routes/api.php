<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\JuegoController;

Route::get('/juegos', [JuegoController::class, 'index']);
Route::get('/juegos/{juego}', [JuegoController::class, 'show']);

Route::get('/prestamos/solicitar', [PrestamoController::class, 'create']);
Route::post('/prestamos', [PrestamoController::class, 'store']);

Route::prefix('admin')->group(function () {
    Route::get('/solicitudes', [PrestamoController::class, 'adminIndex']);
    Route::patch('/solicitudes/{id}/estado', [PrestamoController::class, 'updateEstado']);
    Route::post('/solicitudes/{id}/confirmar', [PrestamoController::class, 'confirmarCodigo']);
    Route::delete('/juegos/destroy-all', [JuegoController::class, 'destroyAll']);
    Route::resource('juegos', JuegoController::class)->except(['index', 'show']);
});
