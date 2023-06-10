<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;



class PremioController extends BaseController
{

    public function mostrarPremios() {
        $premios = Premio::all()->where('activo', '1');
        return view('mostrar-premios')->with('premios', $premios);
    }

    public function obtenerPremiosAjax()
    {
        $premios = Premio::all()->where('activo', '1');
        return response()->json($premios);
    }


    public function destacarPremio(Request $request)
    {
        $premio = Premio::find($request->id);
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

    public function crearPremio()
    {
        return view('admin.crear-premio');
    }

    public function crearPremioPost(Request $request)
    {
        //Validación url
        if (!$this->verfificarUrl($request->input('url'))) {
            return redirect()->route('crear-premio')->with('error', 'La url no es válida.');
        }

        $imagen = $request->file('imagen');
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
        $premio->delete();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha eliminado correctamente.');
    }

    public function editarPremio(Request $request)
    {
        $premio = Premio::find($request->id);
        return view('admin.editar-premio', compact('premio'));
    }

    public function guardarCambiosPremio(Request $request)
    {
        $premio = Premio::find(request()->input('id-premio'));

        if ($request->hasFile('imagen-premio')) {
            $imagen = $request->file('imagen-premio');
            $nombreImagen = $request->file('imagen-premio')->hashName();
            $imagen->move(public_path() . '/images/premio/', $nombreImagen);
            //Borra la imagen anterior
            unlink(public_path('images/premio/' . $premio->imagen));
            //Añade id del premio al nombre de la imagen
            $nombreImagen = $premio->id . $nombreImagen;
        } else {
            $nombreImagen = $premio->imagen;
        }

        $premio->titulo = $request->input('titulo-premio');
        $premio->fecha = $request->input('fecha-premio');
        $premio->url = $request->input('url-premio');
        $premio->descripcion = $request->input('descripcion-premio');
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
