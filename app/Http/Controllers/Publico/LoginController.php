<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'index');
    }

    public function index()
    {
        if(session('perfil_id') == 1){

            return view('Perfil1.Dashboard.index');

        }else if(session('perfil_id') == 2){

            return view('Perfil2.Dashboard.index');
        }
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->fl_estado == 1) {

            $user->setSession($user);

        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect()
                ->route('publicoInicio')
                ->withErrors(['status' => '¡Lo sentimos! Credenciales no válidas.']);
        }
    }

    public function username()
    {
        return 'usuario';
    }
}

