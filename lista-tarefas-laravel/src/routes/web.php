<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\ChamadoController;

Route::get('/', function () {
    return redirect()->route('chamados.index');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('chamados', ChamadoController::class);