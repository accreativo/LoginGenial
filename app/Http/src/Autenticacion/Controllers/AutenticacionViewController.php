<?php

namespace App\Http\src\Autenticacion\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutenticacionViewController extends Controller
{
    function login() {
        return view('Autenticacion.Login.index');
    }

    function recuperacion() {
        return view('Autenticacion.Recuperacion.index');
    }
}
