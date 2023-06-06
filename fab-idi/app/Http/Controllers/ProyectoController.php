<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\CursoAcademico;

class ProyectoController extends Controller
{

    public function guardarCambiosProyecto()
    {
        return view('admin.inicio-admin');
    }

    public function editarProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        $cursosAcademicos = CursoAcademico::all();
        return view('admin/editar-proyecto', compact('proyecto', 'cursosAcademicos'));
    }

    public function crearProyecto()
    {
        $cursosAcademicos = CursoAcademico::all();
        return view('admin.crear-proyecto', compact('cursosAcademicos'));
    }

    public function guardarProyecto(Request $request)
    {
        if ($request->hasFile('imagen-proyecto')) {
            $imagen = $request->file('imagen-proyecto');
            $nombreImagen = $request->file('imagen-proyecto')->hashName();
            $imagen->move(public_path() . '/images/proyectos/', $nombreImagen);
        } else {
            $nombreImagen = 'proyecto-default.webp';
        }
        
        $proyecto = Proyecto::create([
            'nombre' => $request->input('nombre-proyecto'),
            'autor' => $request->input('autor-proyecto'),
            'centro' => $request->input('centro-proyecto'),
            'curso_academico_id' => $request->input('select-curso-academico'),
            'tipo_proyecto_id' => $request->input('select-tipo-proyecto'),
            'descripcion' => $request->input('descripcion-proyecto'),
            'destacado' => '0',
            'disponible' => $request->input('disponible') == '1' ? true : false,
            'url' => $request->input('url-proyecto'),
            'imagen' => $nombreImagen,
            'activo' => '1',
        ]);
        
        return view('admin.inicio-admin');
    }

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
