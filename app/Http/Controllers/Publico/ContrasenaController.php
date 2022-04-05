<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class ContrasenaController extends Controller
{
    public function index()
    {
        return view('Publico.Clave.index');
    }

    public function solicitar(Request $request)
    {
        $correo = $request->correo;
        $usuario = UsuarioModel::where('correo', '=', $correo)->first();

        $usuario = UsuarioModel::whereCorreo($request->correo)->first();
        $usuario->update([
            'fl_recuperacion' => true,
            'fe_recuperacion' => date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")."+ 4 hour"))
        ]);

        #Mandamos correo al socio
        // Mail::to($usuario->correo)
        //     ->queue(new MailRecuperarContrasena($usuario));

        return redirect()
            ->route('publicoInicio')
            ->with('status', 'Credenciales enviadas, revisa tu correo.');
    }
}
