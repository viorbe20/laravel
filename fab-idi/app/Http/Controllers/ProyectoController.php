<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{

    public function obtenerProyectosAjax()
    {
        $proyecto = Proyecto::all()->where('activo', '1');
        return response()->json($proyecto);
    }

    public function gestionProyectosIntercentros(Request $request)
    {
        return view('admin.gestion-proyectos-intercentros');
    }
}
