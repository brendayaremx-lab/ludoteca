<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\PrestamoController;

Route::get('/', fn() => view('ludoteca'));
Route::get('/ludoteca', fn() => view('ludoteca'));
Route::get('/catalogo', fn() => view('catalogo'));
Route::get('/indexForm', fn() => view('indexForm'));
Route::get('/indexConfirm', fn() => view('indexConfirm'));
Route::get('/admin/catalogo', fn() => view('adminCatalogo'));
Route::get('/admin/solicitudes', fn() => view('indexSolicitudes'));

Route::prefix('admin')->group(function () {
    Route::patch('/solicitudes/{id}/estado', [PrestamoController::class, 'updateEstado']);
    Route::post('/solicitudes/{id}/confirmar', [PrestamoController::class, 'confirmarCodigo']);
    Route::delete('/juegos/destroy-all', [JuegoController::class, 'destroyAll']);
    Route::resource('juegos', JuegoController::class)->except(['index', 'show']);
});