<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get("/", [InicioController::class, "index"])->name("index");

// Auth
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register");

// Admin gestión vídeos
Route::get("/gestion-videos", [AdminController::class, "gestionVideos"])->name("gestion-videos");
Route::get("/gestion-videos/editar/{id}", [AdminController::class, "editarVideos"])->name("editar-videos");
Route::post("/gestion-videos/editar/{id}", [AdminController::class, "actualizarVideo"])->name("actualizar-video");




Route::get("/panel-colaboradores", [AdminController::class, "colaboradores"])->name("colaboradores");
Route::get("/revistas", [AdminController::class, "revistas"])->name("revistas");