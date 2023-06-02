<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function gestionProyectosIntercentros(Request $request)
    {
        return view('admin.gestion-proyectos-intercentros');
    }
}
