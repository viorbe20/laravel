<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function inicioAdmin(Request $request)
    {
        // Agrega un nuevo video a la base de datos
        if ($request->has('agregar_video')) {
            $video = new Video;
            $video->nombre = $request->nombre;
            $video->url = $request->url;
            $video->save();
        }
    
        // Extrae los registros de la base de datos y los envía a la vista
        $videos = Video::all();
        return view('admin/inicio-admin')->with('videos', $videos);
    }
    

    public function colaboradores()
    {
        return view('admin/colaboradores');
    }

    public function revistas()
    {
        return view('admin/revistas');
    }

}
