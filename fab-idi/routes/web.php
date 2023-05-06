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

// Pages Admin
Route::get("/inicio-admin", [AdminController::class, "inicioAdmin"])->name("inicio-admin");
Route::post('/videos', [AdminController::class, 'inicioAdmin'])->name('inicio-admin');
Route::get("/panel-colaboradores", [AdminController::class, "colaboradores"])->name("colaboradores");
Route::get("/revistas", [AdminController::class, "revistas"])->name("revistas");