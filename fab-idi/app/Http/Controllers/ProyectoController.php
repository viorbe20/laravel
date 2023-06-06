<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\CursoAcademico;

class ProyectoController extends Controller
{

    public function obtenerCursoAcademicoAjax()
    {
        $cursos = CursoAcademico::all();
        return response()->json($cursos);
    }

    public function obtenerProyectosAjax()
    {
        $proyecto = Proyecto::all()->where('activo', '1');
        return response()->json($proyecto);
    }

    public function gestionProyectosIntercentros(Request $request)
    {
        return view('admin.gestion-proyectos-intercentros');
    }

    
    public function gestionProyectosPip(Request $request)
    {
        return view('admin.gestion-proyectos-pip');
    }
}
