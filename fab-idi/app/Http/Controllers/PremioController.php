<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;


class PremioController extends Controller
{
    public function mostrarPremios()
    {
        return view('premios');
    }
}
