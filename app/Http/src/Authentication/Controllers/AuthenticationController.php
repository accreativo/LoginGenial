<?php

namespace App\Http\src\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Shared\Utils\ApiResponseUtil;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function unauthorized()
    {
        return ApiResponseUtil::unauthorized();
    }

    protected function sendLoginResponse(Request $request)
    {
        $user = $request->user();

        $response = $user->login();

        $this->clearLoginAttempts($request);

        return ApiResponseUtil::success($response);
    }

    protected function validateLoginRequest(Request $request)
    {
        $rules = array(
            'usuario' => array('required','string','exists:usuarios,usuario,fl_estado,1'),
            'password' => array('required','string'),
        );

        $message = array(
            'usuario.required' => 'Es necesario el usuario',
            'usuario.string' => 'Formato del usuario no válido',
            'usuario.exists' => 'Acceso denegado',
            'password.required' => 'Es necesario el password',
            'password.string' => 'Formato del password no válido',
        );

        $request->validate($rules, $message);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $msg = array(
            'msg' => 'incorrect credential'
        );
        return new JsonResponse($msg, 401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->token()->revoke();

        return new JsonResponse('Token revoked', 200);
    }

    public function username() {
        return 'user';
    }
}
