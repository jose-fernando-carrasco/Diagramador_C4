<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\InvitacionproyectoController;
use App\Http\Controllers\InvitacionsalaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
    // return view('welcome');
	return view('auth.login-register');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Saber que user esta autenicado */
Route::get('auth/user', function() {
	if(auth()->check()) 
		return response()->json([
			'authUser' => auth()->user()
		]);
	return null;
});

Route::get('users/{user_id}/get_user', [UserController::class,'get_user'])->name('users.get_user');
Route::post('users/importarArchitect', [UserController::class,'importarArchitect'])->name('users.importarArchitect');


/* posts */
Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post_id}/get_comments', [PostController::class,'get_comments'])->name('posts.get_comments');




/* comments */
Route::post('comments/store',[CommentController::class, 'store'])->name('comments.store');

// Usuarios
Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::delete('/{user}', 'destroy')->name('users.destroy');
	Route::get('/show/{user}', 'show')->name('users.show');
	Route::put('/update', 'update')->name('users.update');
	Route::post('/subir/foto', 'subirfoto')->name('users.subirfoto');
});


//proyectos
Route::prefix('proyectos')->controller(ProyectoController::class)->group(function () {
    Route::get('/', 'index')->name('proyectos.index');
	Route::get('/show/{proyecto}', 'show')->name('proyectos.show');
	Route::delete('/{proyecto}/destroy', 'destroy')->name('proyectos.destroy');
	Route::get('/create', 'create')->name('proyectos.create');
	Route::post('/store', 'store')->name('proyectos.store');
	Route::delete('/expulsar/{proyecto}/{user}', 'expulsar')->name('proyectos.expulsar');
});



//Invitaciones a Proyectos
Route::prefix('invitaciones')->controller(InvitacionproyectoController::class)->group(function () {
	Route::get('/', 'index')->name('invitacionesP.index');
    Route::post('/store2', 'invitacionesstore2')->name('invitacionesP.store2');
	Route::get('/cantidad/proyecto', 'cantidad')->name('invitacionesP.cantidad');
	Route::get('/get/proyecto', 'get')->name('invitacionesP.get');
	Route::delete('/{invitacion}/destroy', 'destroy')->name('invitacionesP.destroy');
	Route::get('/{invitacion}/show', 'show')->name('invitacionesP.show');
	Route::put('/{invitacion}/aceptar', 'aceptar')->name('invitacionesP.aceptar');
});


//salas
Route::prefix('salas')->controller(SalaController::class)->group(function () {
    Route::get('/create', 'create')->name('salas.create');
	Route::post('/store', 'store')->name('salas.store');
	Route::get('/', 'index')->name('salas.index');
    Route::delete('/destroy/{sala}', 'destroy')->name('salas.destroy');
	Route::get('/show/{sala}/{diagrama}', 'show')->name('salas.show');
    Route::put('/finalizar/{sala}', 'finalizar')->name('salas.finalizar');
    Route::get('/previa/{sala}', 'previa')->name('salas.previa');
	Route::put('/siguiente/crear', 'siguiente')->name('salas.siguiente');
	Route::get('/siguiente/elegido/{sala_id}/{diagrama_id?}', 'elegido')->name('salas.elegido');
	//pruebas
	Route::put('/guardarDiagrama/{id}', 'guardarDiagrama')->name('salas.guardarDiagrama');
	Route::get('/mostrarDiagrama/{id}', 'mostrarDiagrama')->name('salas.mostrarDiagrama');
});


//Invitacion a salas
Route::prefix('invitacionsalas')->controller(InvitacionsalaController::class)->group(function () { 
    Route::get('/', 'index')->name('invitacionsalas.index');
    Route::post('/store', 'store')->name('invitacionsalas.store'); 
	Route::get('/cantidad/Proyectosysalas', 'cantidad')->name('invitacionsalas.cantidad');
	Route::get('/get/sala', 'get')->name('invitacionsalas.get');
	Route::delete('/destroy/{invitacion}', 'destroy')->name('invitacionsalas.destroy');
	Route::get('/{sala_id}/esVisitante', 'esVisitante')->name('invitacionsalas.esVisitante');
	Route::get('/get/proy/{proy_id}/sala/{sala_id}/userenvio/{user_envio_id}','getInvitacion')->name('invitacionsalas.getInvitacion');
});