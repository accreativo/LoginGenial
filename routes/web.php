<?php

use App\Http\src\Autenticacion\Controllers\ContrasenaController;
use App\Http\src\Autenticacion\Controllers\AutenticacionViewController;
use App\Http\src\Autenticacion\Controllers\CredencialController;
use App\Http\src\Rol\Controllers\RolViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([ ], function () {

    ###Vista Login
    Route::get('/', [AutenticacionViewController::class, 'login'])
        ->name('autenticacionViewLogin');

    ###Proceso Login
    Route::post('/login', [CredencialController::class, 'login'])
        ->name('autenticacionProcessCredencialLogin');

    ###Proceso Cierre Sesion
    Route::post('/logout', [CredencialController::class, 'logout'])
        ->name('autenticacionProcessCredencialLogout');

    Route::group(['prefix' => 'credenciales'], function ()
    {
        ###Vista Recuperar Credenciales
        Route::get('/solicitar-cambio', [AutenticacionViewController::class, 'recuperacion'])
            ->name('autenticacionViewRecuperacion');

        ###Proceso Recuperar Credenciales
        Route::post('/solicitar-cambio', [ContrasenaController::class, 'solicitar'])
            ->name('autenticacionProcessContrsenaSolicitar');

        ###Vista Cambio Credenciales
        Route::get('/cambiar/{tkn_usuario?}/{tkn_password?}', [AutenticacionViewController::class, 'cambio'])
            ->name('autenticacionViewCambioContrasena');

        ###Proceso Cambio Credenciales
        Route::post('/cambiar', [ContrasenaController::class, 'cambio'])
            ->name('autenticacionProcessContrasenaCambio');
    });

    Route::group(['prefix' => 'registro'], function ()
    {

    });
    Route::group(['prefix' => 'politicas'], function ()
    {

    });
    Route::group(['prefix' => 'recursos'], function ()
    {

    });
});

Route::group(['prefix' => 'roles'], function ()
{
    ###Vista Recuperar Credenciales
    Route::get('/', [RolViewController::class, 'listado'])
        ->name('rolViewListado');

    ###Vista Recuperar Credenciales
    Route::get('/nuevo-rol', [RolViewController::class, 'crear'])
        ->name('rolViewCrear');
});
