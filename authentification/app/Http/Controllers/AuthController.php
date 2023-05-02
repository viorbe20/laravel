<?php

/**
 * https://www.youtube.com/watch?v=N_Qdqj0z4J4&t=101s
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     * If the attempt is successful, redirect to the intended url.
     * If the attempt fails, redirect back with an error message.
     */
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
        return view('register');
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
