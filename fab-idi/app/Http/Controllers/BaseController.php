<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function generarPasswordAleatoria($longitud = 8, $caracteresEspeciales = true)
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
}
