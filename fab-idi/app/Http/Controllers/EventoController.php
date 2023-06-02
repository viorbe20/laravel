<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function gestionEventos()
    {
        return view('admin.gestion-eventos');
    }
}
