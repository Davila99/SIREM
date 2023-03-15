<?php

use App\Http\Controllers\BuscadorEstudiante;
use App\Http\Controllers\EstudianteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(BuscadorEstudiante::class)->group(function () {
    Route::get('/estudiantes', 'index');
    Route::post('/estudiante', 'store');
    Route::get('/estudiante/{id}', 'show');
    Route::post('/estudiante/{id}', 'update');
    Route::post('/estudiante/{id}', 'destroy');
   
});
