<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            
            //Comprueba si el usuario está activo
            if (auth()->user()->active == false) {
                auth()->logout();
                return back()->with('error', 'User not active.');
            }

            //Obtiene el perfil del usuario y lo pasa a la vista
            $profile = auth()->user()->profile->name;
            return redirect('/' . $profile);
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
        $usuario = new Usuario();

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
