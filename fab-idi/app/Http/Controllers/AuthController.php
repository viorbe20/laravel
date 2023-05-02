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
        return view('login', compact('showLoginButton'));
    }

    /**
     * Handle an authentication attempt.
     * If the attempt is successful, redirect to the intended url.
     * If the attempt fails, redirect back with an error message.
     */
    public function loginPost(Request $request)
    {
        $showLoginButton = false;
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            //return redirect()->intended('home');
            return redirect('/home')->with('success', 'Login successfully.');
        }

        return back()->with('error', 'Wrong credentials.');
    }
}
