<?php

use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// esta ruta llama a todos los metodos del la clase EstudianteController
Route::resource('estudiantes', EstudianteController::class);
