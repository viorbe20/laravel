<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entidad;
use App\Models\Perfil;
use App\Models\Colaborador;
use App\Models\Proyecto;
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

    public function guardarUsuario(Request $request)
    {

        $tipoUsuario = $request->input('select-tipo-usuario');

        //Perfil usuario - procesamiento de la imagen
        if ($request->hasFile('foto-usuario')) {
            $file = $request->file('foto-usuario');
            $maxSize = 2097152;

            if ($file->getSize() > $maxSize) {
                return redirect()->route('crear-usuario')->with('error', 'El tamaño de la imagen no puede superar los 2mb.');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->route('crear-usuario')->with('error', 'La extensiones permitidas son: jpg, png, jpeg o webp.');
                } else {
                    $nombreImagen = '';
                }
            }
        } else {
            $nombreImagen = 'usuario-default.png';
        }

        //Perfil entidad - procesamiento de la imagen
        if ($request->hasFile('foto-entidad')) {
            $file = $request->file('foto-entidad');
            $maxSize = 2097152; // 2 megabytes

            if ($file->getSize() > $maxSize) {
                return redirect()->route('crear-entidad')->with('error', 'El tamaño de la imagen no puede superar los 2mb.');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->route('crear-entidad')->with('error', 'La extensiones permitidas son: jpg, png, jpeg o webp.');
                } else {
                    $nombreImagen = '';
                }
                return redirect()->route('crear-entidad')->with('success', 'La imagen se cargó correctamente.');
            }
        } else {
            $nombreImagen = 'entidad-default.png';
        }

        //Procesamiento del usuario
        if ($tipoUsuario == "usuario") {

            $usuario = User::create([
                'nombre' => $request->input('nombre-usuario'),
                'apellidos' => $request->input('apellidos-usuario'),
                'email' => $request->input('email-usuario'),
                'password' => '',
                'idColaborador' => $request->input('select-tipo-colaborador'),
                'perfil_id' => $request->input('select-perfil-usuario'),
                'activo' => 1,
                'telefono' => $request->input('telefono-usuario'),
                'twitter' => $request->input('twitter-usuario'),
                'instagram' => $request->input('instagram-usuario'),
                'linkedin' => $request->input('linkedin-usuario'),
            ]);

            //Si lleva imagen le ponemos el nombre del id, la extension y la guardamos en la carpeta
            if ($request->hasFile('foto-usuario')) {
                $ultimoId = User::latest('id')->value('id');
                $extension = $request->file('foto-usuario')->getClientOriginalExtension();
                $nombreImagen = $ultimoId . '.' . $extension;
                $request->file('foto-usuario')->move(public_path('img/usuarios'), $nombreImagen);
                $usuario->imagen = $nombreImagen;
                $usuario->save();
            } else {
                $usuario->imagen = 'usuario-default.webp';
                $usuario->save();
            }

            //Generación de la contraseña aleatoria y envío del email
            $randomPassword = $this->generarPasswordAleatoria();

            $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
            $transport->setUsername('viorbe20@gmail.com');
            $transport->setPassword('qgeccmuaivcojphv');

            $mailer = new Swift_Mailer($transport);

            $message = new Swift_Message('Alta de usuario Red FAB-IDI');
            $message->setFrom(['viorbe20@gmail.com' => 'Fab Idi']);
            $message->setTo(['a20orbevi@iesgrancapitan.org' => $usuario->nombre]);
            $message->setTo([$usuario->email  => $usuario->nombre]);
            $message->setBody(view('emails.alta-usuario', ['usuario' => $usuario, 'randomPassword' => $randomPassword])->render(), 'text/html');
            $mailer->send($message);

            //Escripta la contraseña y la guarda en la base de datos
            $usuario->password = bcrypt($randomPassword);
            $usuario->update();

            return redirect()->route('gestion-usuarios');
        } else if ($tipoUsuario == "entidad") {

            $entidad = Entidad::create([
                'nombre' => $request->input('nombre-entidad'),
                'representante' => $request->input('representante-entidad'),
                'email' => $request->input('email-entidad'),
                'telefono' => $request->input('telefono-entidad'),
                'web' => $request->input('web-entidad'),
                'colaborador_id' => $request->input('select-tipo-colaborador-entidad'),
                'imagen' => $nombreImagen,
                'activo' => 1
            ]);

            if ($request->hasFile('foto-entidad')) {
                $ultimoId = Entidad::latest('id')->value('id');
                $extension = $request->file('foto-entidad')->getClientOriginalExtension();
                $nombreImagen = $ultimoId . '.' . $extension;
                $request->file('foto-entidad')->move(public_path('img/entidades'), $nombreImagen);
                $entidad->imagen = $nombreImagen;
                $entidad->save();
            } else {
                $entidad->imagen = 'entidad-default.webp';
                $entidad->save();
            }

            return redirect()->route('gestion-entidades');
        }
    }

    public function renovarContrasena($id)
    {
        $usuario = User::find($id);
        $randomPassword = $this->generarPasswordAleatoria();
        $usuario->password = bcrypt($randomPassword);
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
        // proyectos activos donde tipo_proyecto_id sea el id de tipo_proyecto Proyecto PIP y el proyecto esté desactivado
        $proyectosDestacados = Proyecto::join('tipos_proyectos', 'proyectos.tipo_proyecto_id', '=', 'tipos_proyectos.id')
            ->where('tipos_proyectos.tipos_proyectos', '=', 'Proyecto PIP')
            ->where('proyectos.activo', '=', '1')
            ->where('proyectos.destacado', '=', '1')
            ->get();

        $proyectosDisponibles = Proyecto::join('tipos_proyectos', 'proyectos.tipo_proyecto_id', '=', 'tipos_proyectos.id')
            ->where('tipos_proyectos.tipos_proyectos', '=', 'Proyecto PIP')
            ->where('proyectos.activo', '=', '1')
            ->where('proyectos.destacado', '=', '0')
            ->where('proyectos.disponible', '=', '1')
            ->get();

        return view("mentorizacion", compact('proyectosDestacados', 'proyectosDisponibles'));
    }

    public function mentorizacionPost(Request $request)
    {
        // si es MENTOR selcciona el proyecto a mentorizar
        if (auth()->user() && (Auth::user()::join('perfiles', 'users.perfil_id', '=', 'perfiles.id')->where('perfiles.perfil', 'mentor')
            || Auth::user()::join('colaboradores', 'users.id_colaborador', '=', 'colaboradores.id')->where('colaboradores.colaborador', 'mentor'))) {
            // obtener proyecto por el nombre
            $proyecto = Proyecto::where('nombre', '=', $request->input('proyecto'))->first();
            // Si no ha seleccionado un proyecto
            if ($proyecto == null) {
                return redirect()->route('mentorizacion')->with('error', 'Debes seleccionar un proyecto');
            }
            $data = array(
                'nombreCompleto' => $request->input('nombre-completo'),
                'email' => $request->input('email'),
                'proyecto' => $request->input('proyecto')
            );
            try {
                Mail::send('emails.inscripcion-proyecto', $data, function ($message) use ($data) {
                    $message->from($data['email'], $data['nombreCompleto']);
                    $message->to('maria14998@gmail.com')
                        ->subject('Inscripción para Mentorizar Proyecto');
                });
            } catch (\Swift_TransportException $e) {
                return redirect()->route('mentorizacion')->with('error', 'No se ha podido enviar el correo');
            }

            return redirect()->route('mentorizacion')->with('success', 'Correo enviado correctamente');
        } else {
            // si es USUARIO rellena el formulario con sus datos
            if ($tipoUsuario == 'usuario') {
                $data = array(
                    'tipoUsuario' => $tipoUsuario,
                    'nombre' => $request->input('nombre-usuario'),
                    'apellidos' => $request->input('apellidos-usuario'),
                    'email' => $request->input('email-usuario'),
                    'telefono' => $request->input('telefono-usuario'),
                    'twitter' => $request->input('twitter-usuario'),
                    'instagram' => $request->input('instagram-usuario'),
                    'linkedin' => $request->input('linkedin-usuario'),
                    'mensaje' => $request->input('mensaje-usuario')

                );
                try {
                    Mail::send('emails.inscripcion-mentor', $data, function ($message) use ($data) {
                        $message->from($data['email'], $data['nombre'] . ' ' . $data['apellidos']);
                        $message->to('maria14998@gmail.com')
                            ->subject('Inscripción a red FAB-IDI');
                    });
                } catch (\Swift_TransportException $e) {
                    $enviado = false;
                    return view("quienes-somos", compact('enviado'));
                }
            } else {
                // si es ENTIDAD rellena el formulario con sus datos
                $data = array(
                    'tipoUsuario' => $tipoUsuario,
                    'nombre' => $request->input('nombre-entidad'),
                    'representante' => $request->input('representante-entidad'),
                    'email' => $request->input('email-entidad'),
                    'telefono' => $request->input('telefono-entidad'),
                    'web' => $request->input('web-entidad'),
                    'mensaje' => $request->input('mensaje-entidad')
                );

                try {
                    Mail::send('emails.inscripcion-mentor', $data, function ($message) use ($data) {
                        $message->from($data['email'], $data['nombre']);
                        $message->to('maria14998@gmail.com')
                            ->subject('Inscripción a red FAB-IDI');
                    });
                } catch (\Swift_TransportException $e) {
                    $enviado = false;
                    return redirect()->route('quienes-somos', compact('enviado'));
                }
            }
            $enviado = true;
            return view("quienes-somos", compact('enviado'));
        }
        return redirect()->route('mentorizacion');
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
        User::where('id', $id)->update(['activo' => 0])->update('password', '');

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

    public function crearUsuario()
    {
        return view("admin/crear-usuario");
    }

    public function gestionUsuarios()
    {

        return view("admin/gestion-usuarios");
    }
}
