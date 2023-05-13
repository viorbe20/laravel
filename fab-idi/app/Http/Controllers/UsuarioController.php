<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entidad;


class UsuarioController extends Controller
{
    public function crearUsuarioPost(Request $request)
    {

        $tipoUsuario = $request->input('select-tipo-usuario'); 

        if ($tipoUsuario == "usuario") {
            $usuario = User::create([
                'nombre' => $request->input('nombre-usuario'),
                'apellidos' => $request->input('apellidos-usuario'),
                'email' => $request->input('email-usuario'),
                'password' => $request->input('password-usuario'),
                'perfil_id' => $request->input("select-perfil-usuario"),
                'activo' => 1,
                'telefono' => $request->input('telefono-usuario'),
                'twitter' => $request->input('twitter-usuario'),
                'instagram' => $request->input('instagram-usuario'),
                'linkedin' => $request->input('linkedin-usuario'),
            ]);

            $usuario->save();

            //Falta foto
        } else {
            $entidad = Entidad::create([
                'nombre' => $request->input('nombre-entidad'),
                'representante' => $request->input('representante-entidad'),
                'email' => $request->input('email-entidad'),
                'telefono' => $request->input('telefono-entidad'),
                'web' => $request->input('web-entidad'),
                'imagen' => $request->input('imagen-entidad'),
                'activo' => 1,
            ]);
        }

            
            

        return view("admin/gestion-usuarios");
    }

    public function crearUsuario()
    {
        return view("admin/crear-usuario");
    }

    public function index()
    {

        return view("admin/gestion-usuarios");
    }
}
