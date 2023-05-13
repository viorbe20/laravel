<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index(){
        return view("panel-colaboradores");
    }
    
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

    public function colaboradores()
    {
        return view('admin/colaboradores');
    }
}
