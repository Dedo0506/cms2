<?php

/* use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EtiquetasController;
use App\Http\Controllers\PostController;
 */
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

/* Route::get('/', [PostController::class, 'welcome'])->name('welcome');

Route::resource('/categorias', CategoriasController::class);
Route::resource('/etiquetas', EtiquetasController::class);
Route::resource('/posts', PostController::class);
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EtiquetasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RssAutorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RssController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'welcome'])->name('welcome');
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/listarC', function () { return view('listaC'); });
    Route::get('/listarEstudiantes', function () { return view('listaEstudiantes'); });
    Route::get('/listarUsuarios', function () { return view('listaU'); });

    Route::resource('/categorias', CategoriasController::class)->names('categorias');
    Route::resource('/etiquetas', EtiquetasController::class)->names('etiquetas');
    Route::resource('/posts', PostController::class)->names('posts'); 
    Route::resource('/autor', AutoresController::class)->names('autores'); 
});
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::resource('/usuarios', UserController::class)->names('usuarios');
    Route::resource('/roles', RoleController::class)->names('roles');
});
Route::get('/', [PostController::class, 'welcome'])->name('welcome');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/rss', [RssController::class, 'generate'])->name('rss');
Route::get('/rss-autores', [RssAutorController::class, 'generate'])->name('rss.a
utores');
