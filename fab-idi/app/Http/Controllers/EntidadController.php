<?php

namespace App\Http\Controllers;
use App\Models\Entidad;
use Illuminate\Http\Request;


class EntidadController extends Controller
{
    public function editarEntidad($id)
    {
        $entidad = Entidad::find($id);

        return view('admin/editar-entidad', compact('entidad'));
    }

    public function eliminarEntidad($id)
    {
        Entidad::where('id', $id)->update(['activo' => 0]);
        return view('admin/gestion-entidades');
    }

    public function obtenerEntidadesAjax()
    {
        $entidades = Entidad::all()->where('activo', '1');
        return response()->json($entidades);
    }

    public function gestionEntidades()
    {
        return view("admin/gestion-entidades");
    }
}
