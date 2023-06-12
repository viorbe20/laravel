<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\CursoAcademico;

class ProyectoController extends Controller
{

    public function eliminarProyecto($id)
    {
        Proyecto::where('id', $id)->update(['activo' => 0]);
        
        $proyecto = Proyecto::find($id);

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip')->with('success', 'El proyecto se ha eliminado correctamente.');
        } else {
            return redirect()->route('gestion-proyectos-intercentros')->with('success', 'El proyecto se ha eliminado correctamente.');
        }
    }

    public function quitarProyectoDestacado($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->destacado = '0';
        $proyecto->save();

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip');
        } else {
            return redirect()->route('gestion-proyectos-intercentros');
        }
    }

    
    public function destacarProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->destacado = '1';
        $proyecto->save();
        
        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip');
        } else {
            return redirect()->route('gestion-proyectos-intercentros');
        }
    }

    public function guardarCambiosProyecto(Request $request)
    {
        $proyecto = Proyecto::find(request()->input('id-proyecto'));

        if ($request->hasFile('imagen-proyecto')) {
            $imagen = $request->file('imagen-proyecto');
            $nombreImagen = $request->file('imagen-proyecto')->hashName();
            $imagen->move(public_path() . '/images/proyectos/', $nombreImagen);
            $proyecto->imagen = $nombreImagen;
        }

        $proyecto->nombre = $request->input('nombre-proyecto');
        $proyecto->autor = $request->input('autor-proyecto');
        $proyecto->centro = $request->input('centro-proyecto');
        $proyecto->curso_academico_id = $request->input('select-curso-academico');
        $proyecto->tipo_proyecto_id = $request->input('select-tipo-proyecto');
        $proyecto->descripcion = $request->input('descripcion-proyecto');
        $proyecto->destacado = $request->input('destacado') == '1' ? true : false;
        $proyecto->disponible = $request->input('disponible') == '1' ? true : false;
        $proyecto->url = $request->input('url-proyecto');
        $proyecto->activo = $request->input('activo') == '1' ? true : false;
        $proyecto->save();

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

    public function gestionProyectosIntercentros()
    {
        $proyectosDestacados = Proyecto::where('tipo_proyecto_id', '2')->where('activo', '1')->where('destacado', '1')->get();
        $cursosAcademicos = \App\Models\CursoAcademico::all();
        
        return view('admin.gestion-proyectos-intercentros', compact('proyectosDestacados', 'cursosAcademicos'));
    }


    public function gestionProyectosPip()
    {

        $proyectosDestacados = Proyecto::where('tipo_proyecto_id', '1')->where('activo', '1')->where('destacado', '1')->get();
        $cursosAcademicos = \App\Models\CursoAcademico::all();
        
        return view('admin.gestion-proyectos-pip', compact('proyectosDestacados', 'cursosAcademicos'));
    }
}
