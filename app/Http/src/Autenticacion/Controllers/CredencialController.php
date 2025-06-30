<?php

namespace App\Http\src\Autenticacion\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Autenticacion\Requests\LoginCredencialRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class CredencialController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct() {
        $this->middleware('guest')->except('logout', 'index');
    }

    public function index(LoginCredencialRequest $request)
    {
        $usuario = $request->user();

        if($usuario->perfil_id == 1){

            return view('Perfil1.Dashboard.index');

        }else if($usuario->perfil_id == 2){

            return view('Perfil2.Dashboard.index');
        }
    }

    protected function authenticated(Request $request, $user) {
        if ($user->fl_estado == 1) {

            $user->setSession($user);

        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect()
                ->route('autenticacionViewLogin')
                ->withErrors(['status' => '¡Lo sentimos! Credenciales no válidas.']);
        }
    }

    public function username() {
        return 'usuario';
    }
}
