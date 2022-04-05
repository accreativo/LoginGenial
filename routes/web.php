<?php

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

Route::group(['namespace' => 'Publico'], function () {

    ###Home
        ###Vista Login
        Route::get('/', 'InicioController@index')
                ->name('publicoInicio');

        ###Validar credenciales
        Route::post('/login', 'LoginController@login')
                ->name('publicoLogin');

        ###Cerrar Sesion
        Route::post('/logout', 'LoginController@logout')
            ->name('publicoLogout');

        ###Bienvenido a tu cuenta
        Route::get('/bienvenido','LoginController@index')
            ->name('publicoBienvenido');

    ###Contraseña
        ###Vista Recuperar Contraseña
        Route::get('/recuperar-contrasena', 'ContrasenaController@index')
            ->name('publicoRecuperarContrasena');

        ###Recuperar Contraseña
        Route::post('/recuperar-contrasena', 'ContrasenaController@solicitar')
            ->name('publicoSolicitarRecuperarContrasena');

        ###Vista Renovar Contraseña
        Route::get('/{tkn_usuario}/renovar-contrasena', 'ContrasenaController@nueva')
            ->name('publicoRenovarContrasena');

        ###Renovar Contraseña
        Route::post('/renovar-contrasena', 'ContrasenaController@renovar')
            ->name('publicoSolicitarRenovarContrasena');
});
