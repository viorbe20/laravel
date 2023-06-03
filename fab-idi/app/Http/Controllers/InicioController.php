<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('inicio', compact('videos'));
    }
}
