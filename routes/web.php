<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AsignaturaDocenteController;
use App\Http\Controllers\BuscadorEmpledado;
use App\Http\Controllers\BuscadorEstudiante;
use App\Http\Controllers\BuscadorMatricula;
use App\Http\Controllers\CalificacionDetalleController;
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
use App\Http\Controllers\MatriculaRowController;
use App\Http\Controllers\NivelesAcademicoController;
use App\Http\Controllers\OrganizacionAcademicaController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\TipoMatriculaController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\TutoreController;
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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Rutas de restablecimiento de contraseña
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');




Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('matriculas/pdf/{id}',[MatriculaController::class, 'pdf'])->name('matriculas.pdf');
    Route::post('change-nota/', [CalificacionesController::class, 'changeNota'])->name('change-nota');
    Route::get('generar-acta/{grupoId}/{asignaturaId}/{corteId}', [CalificacionesController::class, 'generarActa'])->name('generar-acta');
    Route::post('generar-acta/{grupoId}/{asignaturaId}/{corteId}', [CalificacionesController::class, 'generarActa'])->name('generar-acta');
    // Rutas de registro
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    //Rutas para actualizar Roles
    Route::get('/users/{user}/editRoles', [UserController::class, 'editRoles'])->name('users.editRoles');
    Route::put('/users/{user}', [UserController::class, 'updateRoles'])->name('users.updateRoles');
    //  Route::put('/users/{user}', [UserController::class, 'updateRoles']);

    Route::resource('roles', RolController::class);

    Route::resource('users', UserController::class);
    Route::resource('cargos', CargoController::class);
    Route::resource('seccion', SeccionController::class);
    Route::resource('turnos', TurnoController::class);
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
    Route::resource('estudianteTutores', EstudiantesTutoresController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('tutores', TutoreController::class);
    Route::resource('consanguiniedades', ConsanguiniedadeController::class);
    Route::resource('asignaturadocente', AsignaturaDocenteController::class);
    Route::resource('matriculas', MatriculaController::class);
    Route::resource('grupos', GruposController::class);
    Route::resource('calificaciones', CalificacionesController::class);
    Route::resource('calificacionesDetalles', CalificacionDetalleController::class);
    Route::resource('tutorestudiante', EstudiantesTutoresController::class);
    Route::resource(
        'organizacionacademica',
        OrganizacionAcademicaController::class
    );
    Route::get('changeStatus/', [
        OrganizacionAcademicaController::class,
        'changeStatus',
    ]);
   


    Route::get('buscar-estudiantes', [EstudianteController::class, 'search']);
    Route::get('buscar-grupos', [GruposController::class, 'search']);
    Route::get('buscador-tipo-matriculas', [
        TipoMatriculaController::class,
        'search',
    ]);

    Route::get('search/', [EstudianteController::class, 'busqueda']);
    Route::controller(BuscadorEstudiante::class)->group(function () {
        Route::get('/search-estudiantes', 'index');
        Route::post('/search-estudiantes', 'store');
        Route::get('/search-estudiantes/{id}', 'show');
        Route::post('/search-estudiantes/{id}', 'update');
        Route::post('/search-estudiantes/{id}', 'destroy');
    });
    Route::get('/search-empleado', [EmpleadoController::class, 'busqueda']);
    Route::get('/search-empleados', [BuscadorEmpledado::class, 'index']);

    Route::get('/search-matricula', [MatriculaController::class, 'busqueda']);
    Route::get('/search-matriculas', [BuscadorMatricula::class, 'index']);
});
