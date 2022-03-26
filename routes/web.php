<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CortesEvaluativoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\NivelesAcademicoController;
use App\Http\Controllers\ProfessionController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cargos', CargoController::class);
Route::resource('nivelacademic', NivelesAcademicoController::class);
Route::resource('grados', GradoController::class);
Route::resource('profession', ProfessionController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('cevaluativos', CortesEvaluativoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
