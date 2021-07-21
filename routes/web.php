<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\BitacoraController;
<<<<<<< HEAD
use App\Http\Controllers\NotaCompraController;
=======
use App\Http\Controllers\MarcaController;
>>>>>>> e1c9b9e3bceada2d68e3e5d2766f8bffb8f7babe

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',UserController::class);

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('clientes',ClienteController::class);

Route::resource('proveedores',ProveedorController::class);

Route::resource('personales',PersonalController::class);

Route::resource('productos',ProductoController::class);

Route::resource('categorias',CategoriaController::class);

Route::resource('bitacora',BitacoraController::class);
<<<<<<< HEAD

Route::resource('notaCompras',NotaCompraController::class);
=======
Route::resource('marcas',MarcaController::class);
>>>>>>> e1c9b9e3bceada2d68e3e5d2766f8bffb8f7babe
