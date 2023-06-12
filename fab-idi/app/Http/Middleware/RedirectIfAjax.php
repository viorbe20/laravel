<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAjax
{
    /**
     * Si es ajax, redirige a la página principal.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->ajax()) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
