<?php

use App\Http\Modules\Authentication\Infrastructure\Controllers\AuthenticationController;
use App\Http\Modules\Authentication\Infrastructure\Controllers\CredentialController;
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

Route::group(['prefix' => 'authentication'], function () {

    Route::post('/login', [AuthenticationController::class, 'login'])
        ->name('authenticationLogin');

    Route::get('/unauthorized', [AuthenticationController::class, 'unauthorized'])
        ->name('authenticationUnauthorized');

    Route::group(['middleware' => ['auth:api']], function () {

        Route::post('/logout', [AuthenticationController::class, 'logout'])
            ->name('authenticationLogout');

        Route::group(['prefix' => 'credential'], function () {

            Route::post('/create', [CredentialController::class, 'create'])
                ->name('credentialCreate');
        });
    });

});
