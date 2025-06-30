<?php

namespace App\Http\src\Rol\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Rol\Models\RolModel;
use App\Http\src\Rol\Requests\RolCrearRequest;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function crear(RolCrearRequest $request)
    {
        $rol = new RolModel();
        $rol->crear($request->all());

        return redirect()
            ->route('autenticacionViewLogin')
            ->with('status', 'Perfil creado con éxito.');
    }
}
