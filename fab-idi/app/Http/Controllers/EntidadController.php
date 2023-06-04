<?php

namespace App\Http\Controllers;
use App\Models\Entidad;
use Illuminate\Http\Request;


class EntidadController extends Controller
{
    public function obtenerEntidadesAjax(Request $request)
    {
        $entidades = Entidad::all();
        return response()->json($entidades);
    }

    public function gestionEntidades()
    {
        return view("admin/gestion-entidades");
    }
}
