<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UsuarioController;

if (!session()->has('perfil')){
    session(['perfil' => 'invitado']);
    session(['showLoginButton'=>true]);
}

Route::get("/", [InicioController::class, "index"])->name("index");

// Auth
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");

//Usuarios
Route::get("/gestion-usuarios", [UsuarioController::class, "index"])->name("gestion-usuarios");
Route::get("/gestion-usuarios/crear", [UsuarioController::class, "crearUsuario"])->name("crear-usuario");
Route::post("/gestion-usuarios/crear", [UsuarioController::class, "crearUsuarioPost"])->name("crear-usuario-post");

// Vídeos 
Route::get("/gestion-videos", [VideoController::class, "gestionVideos"])->name("gestion-videos");
Route::get("/gestion-videos/editar/{id}", [VideoController::class, "editarVideos"])->name("editar-videos");
//Route::post("/gestion-videos/editar/{id}", [VideoController::class, "actualizarVideo"])->name("actualizar-video");

// Colaborador
Route::get("/gestion-colaboradores", [UsuarioController::class, "buscarUsuarioPost"])->name("buscar-usuario");
Route::get("/panel-colaboradores", [ColaboradorController::class, "index"])->name("panel-colaboradores");
Route::get("/gestion-colaboradores", [ColaboradorController::class, "gestionColaboradores"])->name("gestion-colaboradores");
Route::post('/crear-colaborador/{id}', [ColaboradorController::class, 'crearColaboradorPost'])->name('crear-colaborador-post');
Route::match(['GET', 'POST'], '/eliminar-colaborador/{id}', [ColaboradorController::class, 'eliminarColaboradorPost'])->name('eliminar-colaborador-post');



//Route::get("/gestion-colaboradores/crear", [ColaboradorController::class, "crearColaborador"])->name("crear-colaborador");
//Route::post("/gestion-colaboradores/crear", [ColaboradorController::class, "crearColaboradorPost"])->name("crear-colaborador-post");

//Ajax
//Route::get("/obtener-usuarios-ajax", [UsuarioController::class, "obtenerUsuariosAjax"])->name("obtener-usuarios-ajax");
Route::post("/obtener-usuarios-ajax", [UsuarioController::class, "obtenerUsuariosAjax"])->name("obtener-usuarios-ajax");
