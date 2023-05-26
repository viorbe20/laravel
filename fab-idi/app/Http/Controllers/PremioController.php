<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PremioController extends Controller
{
    public function mostrarPremios()
    {
        $premios = Premio::all();

        return view('premios')->with('premios', $premios);
    }
}
