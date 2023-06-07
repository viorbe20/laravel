<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Entidad;
use App\Models\Perfil;
use App\Models\Colaborador;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;


class UsuarioController extends Controller
{
    private function generarPasswordAleatoria($longitud = 8, $caracteresEspeciales = true)
    {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($caracteresEspeciales) {
            $caracteres .= '!@#$%^&*()';
        }
        $password = '';

        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[mt_rand(0, strlen($caracteres) - 1)];
        }

        return $password;
    }

    public function renovarContrasena($id)
    {
        $usuario = User::find($id);
        $randomPassword = $this->generarPasswordAleatoria();
        $usuario->password = bcrypt($randomPassword);
        //dd($usuario->password);
        $usuario->save();
    
        $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
        $transport->setUsername('viorbe20@gmail.com');
        $transport->setPassword('qgeccmuaivcojphv');
    
        $mailer = new Swift_Mailer($transport);
    
        $message = new Swift_Message('Prueba email contraseña');
        $message->setFrom(['viorbe20@gmail.com' => 'Fab Idi']);
        $message->setTo(['viorbe20@gmail.com' => $usuario->nombre]);
        $message->setBody(view('emails.nueva-contrasena', ['usuario' => $usuario, 'randomPassword' => $randomPassword])->render(), 'text/html');
        $mailer->send($message);
    
        return redirect()->route('gestion-contrasenas');
    }
    


    public function gestionContrasenas()
    {
        return view('admin.gestion-contrasenas');
    }

    public function eventos()
    {
        return view("eventos");
    }

    public function proyectosIntercentros()
    {
        return view("proyectos-intercentros");
    }

    public function mentorizacion()
    {
        return view("mentorizacion");
    }

    public function revistas()
    {
        return view("revistas");
    }

    public function quienesSomos()
    {
        return view("quienes-somos");
    }

    public function guardarCambiosUsuario(Request $request)
    {
        $user = User::find($request->input('id-usuario'));
        $user->nombre = $request->input('nombre-usuario');
        $user->apellidos = $request->input('apellidos-usuario');
        $user->email = $request->input('email-usuario');
        $user->telefono = $request->input('telefono-usuario');
        $user->twitter = $request->input('twitter-usuario');
        $user->instagram = $request->input('instagram-usuario');
        $user->linkedin = $request->input('linkedin-usuario');
        $user->perfil_id = $request->input('select-perfil-usuario');
        $user->save();
    
        return redirect()->route('gestion-usuarios');
    }
    

    public function editarUsuario($id)
    {
        $usuario = User::find($id);

        return view('admin/editar-usuario', compact('usuario'));
    }

    public function eliminarUsuario($id)
    {
        User::where('id', $id)->update(['activo' => 0]);

        return view('admin/gestion-usuarios');
    }

    public function obtenerPerfilesAjax()
    {
        $perfiles = Perfil::all();
        return response()->json($perfiles);
    }

    public function obtenerColaboradoresAjax()
    {
        $colaboradores = Colaborador::all();
        return response()->json($colaboradores);
    }

    public function obtenerUsuariosAjax(Request $request)
    {
        $query = $request->get('query');
        $usuarios = User::where('nombre', 'LIKE', '%' . $query . '%')->get();
        return response()->json($usuarios);
    }

    public function crearUsuarioPost(Request $request)
    {

        $tipoUsuario = $request->input('select-tipo-usuario');

        $randomPassword = $this->generarPasswordAleatoria();

        if ($tipoUsuario == "usuario") {


            $usuario = User::create([
                'nombre' => $request->input('nombre-usuario'),
                'apellidos' => $request->input('apellidos-usuario'),
                'email' => $request->input('email-usuario'),
                'password' => bcrypt($randomPassword),
                'idColaborador' => $request->input('select-tipo-colaborador'),
                'perfil_id' => 1,
                'activo' => 1,
                'telefono' => $request->input('telefono-usuario'),
                'twitter' => $request->input('twitter-usuario'),
                'instagram' => $request->input('instagram-usuario'),
                'linkedin' => $request->input('linkedin-usuario'),
                'imagen' => 'usuario-default.webp'
            ]);


            if ($request->hasFile('foto-usuario')) {
                //guarda en la carpeta storage/app/public/usuarios
                $usuario->imagen = $request->file('foto-usuario')->hashName();
                $request->file('foto-usuario')->store('public/images/usuarios/');
                $usuario->save();
            }


            //Falta foto
        } else {
            $entidad = Entidad::create([
                'nombre' => $request->input('nombre-entidad'),
                'representante' => $request->input('representante-entidad'),
                'email' => $request->input('email-entidad'),
                'telefono' => $request->input('telefono-entidad'),
                'web' => $request->input('web-entidad'),
                'colaborador_id' => $request->input('select-tipo-colaborador-entidad'),
                'imagen' => 'entidad-default.webp',
                'activo' => 1
            ]);

            if ($request->hasFile('foto-entidad')) {
                //guarda en la carpeta storage/app/public/usuarios
                $request->file('foto-entidad')->store('public/images/usuarios/');
                $entidad->imagen = $request->file('foto-entidad')->hashName();
                $entidad->save();
            }
        }

        return redirect()->route('gestion-usuarios');
    }

    public function crearUsuario()
    {
        return view("admin/crear-usuario");
    }

    public function gestionUsuarios()
    {

        return view("admin/gestion-usuarios");
    }
}
