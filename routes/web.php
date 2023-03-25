<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AsignaturaDocenteController;
use App\Http\Controllers\BuscadorEstudiante;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ConsanguiniedadeController;
use App\Http\Controllers\CortesEvaluativoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudiantesTutoresController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\NivelesAcademicoController;
use App\Http\Controllers\OrganizacionAcademicaController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\TipoMatriculaController;
use App\Http\Controllers\TutoreController;
use App\Models\organizacion_academica;
use Illuminate\Support\Facades\Artisan;
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
    return view('auth/login');
}); 

Route::resource('cargos', CargoController::class);
Route::resource('nivelacademic', NivelesAcademicoController::class);
Route::resource('grados', GradoController::class);
Route::resource('profession', ProfessionController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('cevaluativos', CortesEvaluativoController::class);
Route::resource('tmatricula', TipoMatriculaController::class);
Route::resource('tutores', TutoreController::class);
Route::resource('consanguiniedades', ConsanguiniedadeController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('estudiantes', EstudianteController::class);
Route::get('search/', [EstudianteController::class, 'busqueda']);
Route::resource('empleados', EmpleadoController::class);
Route::resource('tutores', TutoreController::class);
Route::resource('consanguiniedades', ConsanguiniedadeController::class);
Route::resource('asignaturadocente', AsignaturaDocenteController::class);
Route::resource('matriculas', MatriculaController::class);
Route::resource('grupos', GruposController::class);
Route::resource('calificaciones', CalificacionesController::class);
Route::resource('tutorestudiante', EstudiantesTutoresController::class);
Route::resource('organizacionacademica', OrganizacionAcademicaController::class);
Route::get('changeStatus/', [OrganizacionAcademicaController::class, 'changeStatus']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('buscar-estudiantes', [EstudianteController::class, 'search']);
Route::get('buscar-grupos', [GruposController::class, 'search']);
Route::get('buscador-tipo-matriculas', [TipoMatriculaController::class, 'search']);


Route::middleware(['auth'])->group(function () {
    Route::controller(BuscadorEstudiante::class)->group(function () {
        Route::get('/search-estudiantes', 'index' );
        Route::post('/search-estudiantes', 'store');
        Route::get('/search-estudiantes/{id}', 'show');
        Route::post('/search-estudiantes/{id}', 'update');
        Route::post('/search-estudiantes/{id}', 'destroy');
       
    });
});