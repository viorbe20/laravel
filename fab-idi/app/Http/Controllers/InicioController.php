<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $showLoginButton = true;
        return view('inicio', compact('showLoginButton'));
    }
}
