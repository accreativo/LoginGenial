<?php

namespace App\Http\src\Autenticacion\Middlewares;

use Illuminate\Foundation\Http\FormRequest;
use Closure;

class CredencialMiddleware extends FormRequest
{
    /**
        * Handle an incoming request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Closure  $next
        * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if ($this->verifyRule()) {
            return $next($request);
        }
    }

    private function verifyRule()
    {

    }
}
