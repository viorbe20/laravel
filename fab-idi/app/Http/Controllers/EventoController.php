<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function guardarEvento()
    {

        return view('admin.crear-evento');
    }

    public function crearEvento()
    {

        return view('admin.crear-evento');
    }

    public function obtenerEventosAjax()
    {
        $premios = Evento::all();
        return response()->json($premios);
    }

    public function gestionEventos()
    {
        return view('admin.gestion-eventos');
    }
}
