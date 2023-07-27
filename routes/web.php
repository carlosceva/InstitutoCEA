<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ReporteController;
use App\Http\Middleware\DirectorMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    //return view('dashboard');
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware([DirectorMiddleware::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/horarios', HorarioController::class)->names([
        'index' => 'horarios.index',
        'store' => 'horarios.store',
        'update' => 'horarios.update',
        'destroy' => 'horarios.destroy']); 
    Route::resource('/carreras', CarreraController::class)->names([
        'index' => 'carreras.index',
        'store' => 'carreras.store',
        'update' => 'carreras.update',
        'destroy' => 'carreras.destroy',
    ]);
    Route::resource('/ofertas', OfertaController::class)->names([
        'index' => 'ofertas.index',
        'store' => 'ofertas.store',
        'update' => 'ofertas.update',
        'destroy' => 'ofertas.destroy',
    ]);
    Route::resource('/docentes', DocenteController::class)->names([
        'index' => 'docentes.index',
        'store' => 'docentes.store',
        'update' => 'docentes.update',
        'destroy' => 'docentes.destroy',
    ]);
    Route::resource('/calendarios', CalendarioController::class)->names([
        'index' => 'calendarios.index',
        'store' => 'calendarios.store',
        'update' => 'calendarios.update',
        'destroy' => 'calendarios.destroy',
    ]);
    Route::resource('/alumnos', AlumnoController::class)->names([
        'index' => 'alumnos.index',
        'store' => 'alumnos.store',
        'update' => 'alumnos.update',
        'destroy' => 'alumnos.destroy',
    ]);
    Route::resource('/modulos', ModuloController::class)->names([
        'index' => 'modulos.index',
        'store' => 'modulos.store',
        'update' => 'modulos.update',
        'destroy' => 'modulos.destroy',
    ]);
    Route::resource('/notas', NotaController::class)->names([
        'index' => 'notas.index',
        'store' => 'notas.store',
        'update' => 'notas.update',
        'destroy' => 'notas.destroy',
    ]); 
    Route::resource('/inscripciones', InscripcionController::class)->names([
        'index' => 'inscripciones.index',
        'store' => 'inscripciones.store',
        'update' => 'inscripciones.update',
        'destroy' => 'inscripciones.destroy',
    ]);
    Route::post('/inscmodulo', [InscripcionController::class,'storeM'])->name('inscripciones.storeModulo');     
    Route::post('notas/listar-alumnos', [NotaController::class, 'listarAlumnos'])->name('notas.listar-alumnos');
    Route::post('/notas/guardar', [NotaController::class, 'guardarNotas'])->name('notas.guardar');

    Route::resource('/reportes', ReporteController::class)->names([
        'index' => 'reportes.index',
    ]);

    Route::get('/estadisticas', [ReporteController::class, 'estadisticas'])->name('estadisticas.index');
});

//vista para intrusos
Route::get('/unauthorized', [ReporteController::class, 'intruso'])->name('intruso');

require __DIR__.'/auth.php';
