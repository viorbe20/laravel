<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function login()
    {
        $showLoginButton = false;
        return view('auth/login', compact('showLoginButton'));
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
            return redirect('/gestion-usuarios')->with('success', 'Login successfully.');
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
