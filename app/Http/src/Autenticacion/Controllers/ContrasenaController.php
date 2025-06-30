<?php

namespace App\Http\src\Autenticacion\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Autenticacion\Requests\CambioContrasenaRequest;
use App\Http\src\Autenticacion\Requests\SolicitudContrasenaRequest;
use Illuminate\Http\Request;

class ContrasenaController extends Controller
{
    public function solicitar(SolicitudContrasenaRequest $request)
    {
        $credencial = $request->credencial;
        $credencial->solicitudRenovacionCredencial();

        #Mandamos correo al socio
        // Mail::to($usuario->correo)
        //     ->queue(new MailRecuperarContrasena($usuario));

        return redirect()
            ->route('autenticacionViewLogin')
            ->with('status', 'Credenciales enviadas, revisa tu correo.');
    }

    public function cambio(CambioContrasenaRequest $request)
    {
        $credencial = $request->credencial;
        $credencial->renovacionCredencial($request->password);

        return redirect()
            ->route('autenticacionViewLogin')
            ->with('status', 'Cambio de contraseña exitoso.');
    }
}
