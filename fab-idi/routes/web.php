<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\MentorController;

Route::get("/", [InicioController::class, "index"])->name("index");

// Auth
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");

//Usuarios
Route::get("/quienes-somos", [UsuarioController::class, "quienesSomos"])->name("quienes-somos");
Route::get("/mentorizacion", [UsuarioController::class, "mentorizacion"])->name("mentorizacion");
Route::get("/proyectos-intercentros", [UsuarioController::class, "proyectosIntercentros"])->name("proyectos-intercentros");
Route::get("/eventos", [UsuarioController::class, "eventos"])->name("eventos");
Route::get("/revistas", [UsuarioController::class, "revistas"])->name("revistas");
Route::get("/gestion-usuarios", [UsuarioController::class, "index"])->name("gestion-usuarios");
Route::get("/gestion-usuarios/crear-usuario", [UsuarioController::class, "crearUsuario"])->name("crear-usuario");
Route::post("/gestion-usuarios/crear-usuario", [UsuarioController::class, "crearUsuarioPost"])->name("crear-usuario-post");
Route::get("/gestion-usuarios/eliminar-usuario/{id}", [UsuarioController::class, "eliminarUsuario"])->name("eliminar-usuario");
Route::get("/gestion-usuarios/editar-usuario/{id}", [UsuarioController::class, "editarUsuario"])->name("editar-usuario");
Route::match(['GET', 'POST'], "/guardar-cambios-usuario", [UsuarioController::class, "guardarCambiosUsuario"])->name("guardar-cambios-usuario");

// Vídeos 
Route::get("/gestion-videos", [VideoController::class, "gestionVideos"])->name("gestion-videos");
Route::get("/gestion-videos/editar/{id}", [VideoController::class, "editarVideos"])->name("editar-videos");

//Premios
Route::get("/mostrar-premios", [PremioController::class, "mostrarPremios"])->name("mostrar-premios");

// Colaborador
Route::get("/gestion-colaboradores", [UsuarioController::class, "buscarUsuarioPost"])->name("buscar-usuario");
Route::get("/panel-colaboradores", [ColaboradorController::class, "index"])->name("panel-colaboradores");
Route::get("/gestion-colaboradores", [ColaboradorController::class, "gestionColaboradores"])->name("gestion-colaboradores");
Route::match(['GET', 'POST'], '/crear-colaborador/{id}/{tipoColaborador}', [ColaboradorController::class, 'crearColaborador'])->name('crear-colaborador');
Route::match(['GET', 'POST'], '/eliminar-colaborador/{id}', [ColaboradorController::class, 'eliminarColaboradorPost'])->name('eliminar-colaborador-post');


//Ajax
Route::get("/obtener-usuarios-ajax", [UsuarioController::class, "obtenerUsuariosAjax"])->name("obtener-usuarios-ajax");
Route::post("/obtener-usuarios-ajax", [UsuarioController::class, "obtenerUsuariosAjax"])->name("obtener-usuarios-ajax");
Route::get("/obtener-perfiles-ajax", [UsuarioController::class, "obtenerPerfilesAjax"])->name("obtener-perfiles-ajax");

//Emails
Route::match(['GET', 'POST'], "/formulario-mentor", [MentorController::class, "formularioMentor"])->name("formulario-mentor");