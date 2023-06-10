<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;


class AuthController extends BaseController
{
    public function regenerarContrasena(Request $request)
    {
        $email = $request->input('email');

        $usuario = DB::table('users')->where('email', $email)->first();

        if ($usuario) {
            $randomPassword = $this->generarPasswordAleatoria();
            $passwordEncriptada = bcrypt($randomPassword);
            DB::table('users')->where('email', $email)->update(['password' => $passwordEncriptada]);

            $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
            $transport->setUsername('viorbe20@gmail.com');
            $transport->setPassword('qgeccmuaivcojphv');

            $mailer = new Swift_Mailer($transport);

            $message = new Swift_Message('Generación de nueva contraseña Red FAB-IDI');
            $message->setFrom(['viorbe20@gmail.com' => 'Fab Idi']);
            $message->setTo(['viorbe20@gmail.com' => $usuario->nombre]);
            $message->setBody(view('emails.nueva-contrasena', ['usuario' => $usuario, 'randomPassword' => $randomPassword])->render(), 'text/html');
            $mailer->send($message);

            return view('auth.login')->with('success', 'Se ha enviado un email con la nueva contraseña.');
        } else {
            return back()->with('error', 'El email no existe.');
        }
        
    }

    public function olvidarContrasena()
    {
        return view('auth/regenerar-contrasena');
    }

    public function inicioAdmin()
    {
        return view('admin/inicio-admin');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {

            $user = DB::table('users')->where('email', $request->email)->first();

            if ($user->activo == false) {
                auth()->logout();
                return back()->with('error', 'El usuario no está activo.');
            }

            $perfil_id = DB::table('users')->where('email', $request->email)->value('perfil_id');
            $perfil = DB::table('perfiles')->where('id', $perfil_id)->value('perfil');
            session(['perfil' => $perfil]);

            if ($perfil == 'admin') {
                return redirect('/inicio-admin');
            } else {
                return redirect('/');
            }
        }

        return back()->with('error', 'Wrong credentials.');
    }

    public function register()
    {
        $showLoginButton = false;
        return view('auth/register', compact('showLoginButton'));
    }

    public function registerPost(Request $request)
    {
        $usuario = new User();

        $usuario->nombre = $request->name;
        $usuario->apellidos = $request->surnames;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->perfil_id = 1;
        $usuario->activo = false;

        $usuario->save();

        return back()->with('success', 'Register successfully.');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
