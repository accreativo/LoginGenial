<?php

use App\Http\Modules\Rol\Infrastructure\Controllers\RolController;
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

Route::group(['prefix' => 'rol', ['auth:api']], function () {

    Route::post('/create', [RolController::class, 'create'])
        ->name('rolCreate');

    Route::get('/all', [RolController::class, 'getAll'])
        ->name('rolGetAll');
});
