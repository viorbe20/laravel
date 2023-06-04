<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function gestionEntidades()
    {

        return view("admin/gestion-entidades");
    }
}
