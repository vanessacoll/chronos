<?php

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'], function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
   echo Artisan::call('permission:cache-reset');
})->name('home');



Route::get('routers/{id_routers}', [App\Http\Controllers\HomeController::class, 'ObtenerResultado']);

Route::get('notifications', [App\Http\Controllers\HomeController::class, 'post'])->name('post.index');

Route::get('markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('markAsRead');

Route::post('/mark-As-Read', [App\Http\Controllers\HomeController::class, 'markNotification'])->name('markNotification');


// Rutas del Controlador de Tickets

Route::get('/tickets', [App\Http\Controllers\TicketsController::class, 'index'])->name('tickets.index');

// Rutas del Controlador de Routers

Route::get('/routers', [App\Http\Controllers\RoutersController::class, 'index'])->name('routers.index');

Route::get('/routers/{routers}',[App\Http\Controllers\RoutersController::class, 'update'])
    ->name('routers.update');

// Rutas del Controlador de Perfiles

Route::get('/perfiles', [App\Http\Controllers\PerfilesController::class, 'index'])->name('perfiles.index');

Route::get('/perfiles/{perfiles}',[App\Http\Controllers\PerfilesController::class, 'update'])
    ->name('perfiles.update');



// Rutas para el controlador de usuarios

Route::get('/cuentasindex',[App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('cuentas.index');

Route::get('/settings/{user}/index',[App\Http\Controllers\Auth\RegisterController::class, 'settings'])->name('settings.index');

Route::get('/cuentassessiones',[App\Http\Controllers\Auth\RegisterController::class, 'sessiones'])->name('sessiones.index');

Route::patch('cuentas/usuarios/{user}/image',[App\Http\Controllers\Auth\RegisterController::class, 'imagen'])->name('cuentas.imagen.index');


Route::get('/destroy/{user}',[App\Http\Controllers\Auth\RegisterController::class, 'destroy'])
    ->name('cuentas.destroy');

Route::get('/changepassword',[App\Http\Controllers\Auth\RegisterController::class, 'store']);

});
