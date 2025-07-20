<?php

use App\Http\src\Authentication\Requests\CambioContrasenaRequest;
use App\Http\src\Authentication\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([ ], function () {

    Route::post('/login', [AuthenticationController::class, 'login'])
        ->name('authenticationProcessLogin');

    Route::get('/unauthorized', [AuthenticationController::class, 'unauthorized'])
        ->name('authenticationProcessUnauthorized');

    Route::group(['middleware' => ['auth:api']], function () {

        Route::post('/logout', [AuthenticationController::class, 'logout'])
            ->name('authenticationProcessLogout');
    });

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
