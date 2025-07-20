<?php

namespace App\Http\src\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Autenticacion\Requests\RenewalPasswordInstructionsRequest;
use App\Http\src\Autenticacion\Requests\RenewalPasswordRequest;

class PasswordController extends Controller
{
    public function solicitar(RenewalPasswordInstructionsRequest $request)
    {
        $credential = $request->credential;
        $credential->createRenewalPasswordRequest();
    }

    public function cambio(RenewalPasswordRequest $request)
    {
        $credential = $request->credential;
        $credential->renewalPassword($request->password);
    }
}
