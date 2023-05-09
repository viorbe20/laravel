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

            //Comprueba que el campo activo de la tabla usuarios sea true
            $user = DB::table('users')->where('email', $request->email)->first();

            if ($user->activo == false) {
                auth()->logout();
                return back()->with('error', 'El usuario no está activo.');
            }
            return redirect('/')->with('success', 'Login successfully.');
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
        $user = new User();

        $user->nombre = $request->name;
        $user->apellidos = $request->surnames;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->perfil_id = 1;
        $user->activo = false;

        $user->save();

        return back()->with('success', 'Register successfully.');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
