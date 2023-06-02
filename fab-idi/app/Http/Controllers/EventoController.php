<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

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
