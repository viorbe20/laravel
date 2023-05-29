<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

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
