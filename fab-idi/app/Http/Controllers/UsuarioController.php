<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsuarioController extends Controller
{
    public function crearUsuarioPost(){

        return view("admin/crear-usuario");
    }

    public function crearUsuario(){

        return view("admin/crear-usuario");
    }

    public function index(){

        return view("admin/gestion-usuarios");
    }
}