<?php

namespace App\Http\src\Rol\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Rol\Models\RolModel;
use Illuminate\Http\Request;

class RolViewController extends Controller
{
    function listado() {
        $roles = RolModel::all();
        $data = compact('roles');

        return view('Rol.Listado.index', $data);
    }

    function crear() {
        return view('Rol.Crear.index');
    }
}
