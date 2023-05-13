<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function actualizarVideo(Request $request)
    {
        $video = Video::find($request->id);

        $nombre = $request->input('nombre');
        $url = $request->input('url');

        // Verificar si la URL es válida
        $url_pattern = '/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+/';
        if (!preg_match($url_pattern, $url)) {
            return redirect()->back()->with('error', 'La URL del video es inválida.');
        }

        // Actualizar los datos del video
        $video->nombre = $nombre;
        $video->url = $url;
        $video->save();

        return redirect()->route('gestion-videos')->with('success', 'El video se ha actualizado correctamente.');
    }


    public function editarVideos($id)
    {
        //Busca el video con el id que se le pasa por parámetro
        $video = Video::find($id);

        //Pasa el video a la vista
        return view('admin/editar-videos')->with('video', $video);
    }


    public function gestionVideos()
    {
        $videos = Video::all();
        return view('admin/gestion-videos')->with('videos', $videos);
    }
}
