<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function crearColaboradorPost(Request $request)
    {
        if ($request->isMethod('post')) {
            // Lanzar mensaje de error si no se han completado los campos obligatorios
            if (!$request->has('nombre') || !$request->has('tipoColaborador')) {
                return back()->with('error', 'Rellena por favor los campos obligatorios.');
            }

            $nombre = $request->input('nombre');
            $tipoColaborador = $request->input('tipoColaborador');
            $descripcion = $request->input('descripcion');
            $instagram = $request->input('instagram');
            $twitter = $request->input('twitter');
            $linkedin = $request->input('linkedin');
            $web = $request->input('web');

            /*Almacenamiento*/
            $colaborador = new Colaborador;
            $colaborador->nombre = $nombre;
            $colaborador->tipoColaborador = $tipoColaborador;
            $colaborador->descripcion = $descripcion;
            $colaborador->instagram = $instagram;
            $colaborador->twitter = $twitter;
            $colaborador->linkedin = $linkedin;
            $colaborador->web = $web;
            $colaborador->save();

            /*Obtener el último id*/
            $ultimoId = Colaborador::all()->last()->id;

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                //$nombreOriginal = $imagen->getClientOriginalName();
                $extension = $imagen->getClientOriginalExtension();

                /*Configurar el nombre de la foto con el id*/
                $nombreFoto = $ultimoId . '.' . $extension;

                // Guardar la imagen con el nuevo nombre
                $imagen->move(public_path('images/colaboradores'), $nombreFoto);

                // Guardar el nombre de la imagen en la base de datos
                $colaborador->imagen = $nombreFoto;
                $colaborador->save();
            } else {
                $nombreFoto = 'imagen-colaborador-defecto.png';
                $colaborador->imagen = $nombreFoto;
                $colaborador->save();
            }
        }
        return view('admin/crear-colaborador')->with('success', 'El colaborador se ha creado correctamente.');
    }

    public function crearColaborador()
    {
        return view('admin/crear-colaborador');
    }

    public function gestionColaboradores()
    {
        return view('admin/gestion-colaboradores');
    }

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


    public function colaboradores()
    {
        return view('admin/colaboradores');
    }

    public function revistas()
    {
        return view('admin/revistas');
    }
}
