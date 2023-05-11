<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColaboradoresController;
use Illuminate\Support\Facades\Session;


if (!session()->has('perfil')){
    session(['perfil' => 'invitado']);
}


Route::get("/", [InicioController::class, "index"])->name("index");

// Auth
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");

// Admin gestión vídeos
Route::get("/gestion-videos", [AdminController::class, "gestionVideos"])->name("gestion-videos");
Route::get("/gestion-videos/editar/{id}", [AdminController::class, "editarVideos"])->name("editar-videos");
Route::post("/gestion-videos/editar/{id}", [AdminController::class, "actualizarVideo"])->name("actualizar-video");
Route::get("/gestion-colaboradores", [AdminController::class, "gestionColaboradores"])->name("gestion-colaboradores");
Route::get("/gestion-colaboradores/crear", [AdminController::class, "crearColaborador"])->name("crear-colaborador");
Route::post("/gestion-colaboradores/crear", [AdminController::class, "crearColaboradorPost"])->name("crear-colaborador");
Route::get("/revistas", [AdminController::class, "revistas"])->name("revistas");


// Colaboradores
Route::get("/panel-colaboradores", [ColaboradoresController::class, "index"])->name("panel-colaboradores");

