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
Route::get('/listarC',function () { return view('listaC'); });
Route::get('/listarEstudiantes',function () { return view('listaEstudiantes'); });
Route::get('/listarUsuarios',function () { return view('listaU'); });

Route::resource('/categorias', CategoriasController::class);
Route::resource('/etiquetas', EtiquetasController::class);