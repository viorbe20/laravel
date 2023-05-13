<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
//use App\Models\Entidad;


class UsuarioController extends Controller
{
    public function crearUsuarioPost(Request $request)
    {

        $perfilId = $request->input("select-perfil-usuario");
        $nombre = $request->input("nombre-usuario");
        $apellidos = $request->input("apellidos-usuario");
        $email = $request->input("email-usuario");
        $password = $request->input("password-usuario");
       
        var_dump($perfilId);
        
        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->email = $email;
        $usuario->password = $password;
        $usuario->perfil_id = $perfilId;
        $usuario->activo = 1;
        $usuario->save();

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
