<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::resource('vehicles', PostController::class);

Route::get('/', function () {
    $vehiculosRegistrados = \App\Models\Carro::count();
    return view('inicio', compact('vehiculosRegistrados'));
});

Route::get('/registro-vehículos', [PostController::class, 'index'])->name('registro.index');
