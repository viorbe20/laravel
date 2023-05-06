<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            //return redirect()->intended('home');
            return redirect('/home')->with('success', 'Login successfully.');
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

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 

        $user->save();

        return back()->with('success', 'Register successfully.');
    }
}
