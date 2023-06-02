<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;



class PremioController extends Controller
{
    public function obtenerPremiosAjax()
    {
        $premios = Premio::all();
        return response()->json($premios);
    }

    public function destacarPremio(Request $request)
    {
        $premio = Premio::find($request->id);
        //poner destacado a true
        $premio->destacado = true;
        $premio->save();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha destacado correctamente.');
    }

    public function quitarPremioDestacado(Request $request)
    {
        $premio = Premio::find($request->id);
        //poner destacado a false
        $premio->destacado = false;
        $premio->save();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha quitado de destacados correctamente.');
    }

    public function crearPremio(Request $request)
    {
        return view('admin.crear-premio');
    }

    public function crearPremioPost(Request $request)
    {
        $imagen = $request->file('imagen');
        //cambiar nombre de la imagen al titulo del premio mas la fecha y la extension
        $nombreImagen = $request->input('titulo') . date("YmdHis") . "." . $imagen->extension();
        $imagen->move(public_path('img/premios'), $nombreImagen);


       $premio = Premio::create([
            'titulo' => $request->input('titulo'),
            'fecha' => $request->input('fecha'), // '2021-05-05
            'url' => $request->input('url'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $nombreImagen,
            'destacado' => false,
            'activo' => true,

        ]);

        $premio->save();


        return redirect()->route('gestion-premios')->with('success', 'El premio se ha creado correctamente.');
    }

    public function eliminarPremio(Request $request)
    {
        $premio = Premio::find($request->id);
        //borrar imagen de la carpeta img/premios
        unlink(public_path('img/premios/' . $premio->imagen));
        //poner activo a false
        $premio->delete();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha eliminado correctamente.');
    }

    public function editarPremio(Request $request)
    {
        $premio = Premio::find($request->id);
        return view('admin.editar-premio', compact('premio'));
    }

    public function editarPremioPost(Request $request)
    {
        //si se ha subido una imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            //cambiar nombre de la imagen al id del premio mas la extensión
            $nombreImagen = $request->file('name') . date("YmdHis") . "." . $imagen->extension();
            $imagen->move(public_path('img/premios'), $nombreImagen);
            //borrar imagen de la carpeta img/premios
            unlink(public_path('img/premios/' . $request->input('imagen-guardada')));
        } else {
            $nombreImagen = $request->input('imagen-guardada');
        }

        $premio = Premio::find($request->id);
        $premio->titulo = $request->input('titulo');
        $premio->fecha = $request->input('fecha');
        $premio->url = $request->input('url');
        $premio->descripcion = $request->input('descripcion');
        $premio->imagen = $nombreImagen;
        $premio->save();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha editado correctamente.');
    }

    public function gestionPremios()
    {
        $premio = Premio::all();
        return view('admin/gestion-premios')->with('premios', $premio);
    }
}

?>