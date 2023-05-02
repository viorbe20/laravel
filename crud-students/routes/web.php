<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Genera todas las rutas de un CRUD
Route::resource('/alumnos', AlumnoController::class);