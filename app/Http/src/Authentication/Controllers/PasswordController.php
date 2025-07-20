<?php

namespace App\Http\src\Autenticacion\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Autenticacion\Requests\RenewalPasswordInstructionsRequest;
use App\Http\src\Autenticacion\Requests\RenewalPasswordRequest;

class PasswordController extends Controller
{
    public function solicitar(RenewalPasswordInstructionsRequest $request)
    {
        $credential = $request->credential;
        $credential->createRenewalPasswordRequest();

        return redirect()
            ->route('autenticacionViewLogin')
            ->with('status', 'Credential enviada, revisa tu correo.');
    }

    public function cambio(RenewalPasswordRequest $request)
    {
        $credential = $request->credential;
        $credential->renewalPassword($request->password);

        return redirect()
            ->route('autenticacionViewLogin')
            ->with('status', 'Cambio de contraseña exitoso.');
    }
}
