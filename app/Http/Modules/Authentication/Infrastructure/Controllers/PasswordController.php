<?php

namespace App\Http\Modules\Authentication\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Autenticacion\Infrastructure\Requests\RenewalPasswordInstructionsRequest;
use App\Http\Modules\Autenticacion\Infrastructure\Requests\RenewalPasswordRequest;

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
