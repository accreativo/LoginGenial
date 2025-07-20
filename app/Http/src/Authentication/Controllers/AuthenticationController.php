<?php

namespace App\Http\src\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Authentication\Services\LoginCredentialService;
use App\Http\src\Shared\Utils\ApiResponseUtil;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    protected LoginCredentialService $loginCredentialService;

    public function __construct(LoginCredentialService $loginCredentialService)
    {
        $this->middleware('guest')->except('logout');
        $this->loginCredentialService = $loginCredentialService;
    }

    public function unauthorized()
    {
        return ApiResponseUtil::unauthorized();
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $login = $this->loginCredentialService->login($request->user());

        return ApiResponseUtil::success($login);
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

    protected function sendFailedLoginResponse()
    {
        return ApiResponseUtil::validation(['incorrect credential']);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->token()->revoke();

        return ApiResponseUtil::success();
    }

    public function username() {
        return 'user';
    }
}
