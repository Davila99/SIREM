<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AsignaturaDocenteController;
use App\Http\Controllers\BuscadorEmpledado;
use App\Http\Controllers\BuscadorEstudiante;
use App\Http\Controllers\BuscadorMatricula;
use App\Http\Controllers\CalificacionDetalleController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\ActaCalificacionFinalController;
use App\Http\Controllers\PdfActaCalificacionFinalController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ConsanguiniedadeController;
use App\Http\Controllers\CortesEvaluativoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudiantesTutoresController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\HistorialAcademicoController;
use App\Http\Controllers\MatriculaRowController;
use App\Http\Controllers\NivelesAcademicoController;
use App\Http\Controllers\OrganizacionAcademicaController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\ReporteCalificacionesController;
use App\Http\Controllers\ReporteMatriculaController;
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
    Route::get('matriculas/pdf/{id}', [MatriculaController::class, 'pdf'])->name('matriculas.pdf');
    Route::post('change-nota/', [CalificacionesController::class, 'changeNota'])->name('change-nota');
    Route::post('change-password/', [UserController::class, 'Changepassword'])->name('change-password');
    Route::get('detalle-acta/{actaId}', [CalificacionesController::class, 'detalleActa'])->name('detalle-acta');
    Route::post('generar-acta/{grupoId}/{asignaturaId}/{corteId}', [CalificacionesController::class, 'generarActa'])->name('generar-acta');
    Route::post('imprimir-acta', [CalificacionesController::class, 'imprimirActa'])->name('imprimir-acta');
    // Rutas de registro
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    //Rutas para actualizar Roles usuarios
    Route::get('/users/{user}/editRoles', [UserController::class, 'editRoles'])->name('users.editRoles');
    Route::get('/users/{user}/editUser', [UserController::class, 'editUser'])->name('users.editUser');
    Route::patch('/users/{user}/updateUser', [UserController::class, 'updateUser'])->name('users.updateUser');
    Route::put('/users/{user}', [UserController::class, 'updateRoles'])->name('users.updateRoles');

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
    Route::post('estudiantes-importar', [EstudianteController::class, 'importarEstudiante']);
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('estudianteTutores', EstudiantesTutoresController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('tutores', TutoreController::class);
    Route::resource('consanguiniedades', ConsanguiniedadeController::class);
    Route::resource('asignaturadocente', AsignaturaDocenteController::class);
    Route::resource('matriculas', MatriculaController::class);
    Route::resource('grupos', GruposController::class);
    Route::resource('calificaciones', CalificacionesController::class);
    Route::get('historial-academico/{estudiante}', [HistorialAcademicoController::class, 'index'])->name('index');
    //Route::get('descargar-acta', [HistorialAcademicoController::class, 'index'])->name('index');

    // Route::resource('calificaciones-final', ActaCalificacionFinalController::class)->only(['index']);
    Route::get('calificaciones-final/{asignatura_id}/{grupo_id}', [ActaCalificacionFinalController::class, 'index'])->name('index');
    Route::post('/generate-pdf', [ActaCalificacionFinalController::class, 'generatePDF'])->name('generate-pdf');
    Route::post('/download-excel', [ActaCalificacionFinalController::class, 'downloadExcel'])->name('download-excel');
    // Route::get('calificaciones-final-pdf/{asignatura_id}/{grupo_id}', [PdfActaCalificacionFinalController::class, 'index'])->name('index');
    Route::resource('calificaciones-final-pdf', PdfActaCalificacionFinalController::class)->only(['index']);
    Route::resource('calificacionesDetalles', CalificacionDetalleController::class);
    Route::resource('tutorestudiante', EstudiantesTutoresController::class);
    Route::resource(
        'organizacionacademica',
        OrganizacionAcademicaController::class
    );
    Route::resource(
        'organizacionacademica.asignaturadocente',
        AsignaturaDocenteController::class
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

    Route::get('/reporte-matricula', [EstudianteController::class, 'busqueda']);
    Route::post('/export-matriculas-excel', [ReporteMatriculaController::class, 'exportMatricula']);
    Route::get('/data-reporte-matricula', [ReporteMatriculaController::class, 'index']);

    Route::controller(BuscadorEstudiante::class)->group(function () {
        Route::get('/search-estudiantes', 'index');
    });
    Route::get('/reporte-calificaciones', [ReporteCalificacionesController::class, 'busqueda']);
    Route::get('/data-reporte-calificaciones', [ReporteCalificacionesController::class, 'index']);


    Route::get('/search-empleado', [EmpleadoController::class, 'busqueda']);
    Route::get('/search-empleados', [BuscadorEmpledado::class, 'index']);

    Route::get('/search-matricula', [MatriculaController::class, 'busqueda']);
    Route::get('/search-matriculas', [BuscadorMatricula::class, 'index']);
});
