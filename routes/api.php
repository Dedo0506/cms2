<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaApiController;
use App\Http\Controllers\EtiquetasApiController;
use App\Http\Controllers\EstudianteApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/categoria', [CategoriaApiController::class, 'index']);
Route::get('/categoria/{id}', [CategoriaApiController::class, 'show']);
Route::put('/categoria/{id}',[CategoriaApiController::class, 'update']);
Route::delete('/categoria/{id}',[CategoriaApiController::class, 'destroy']);
Route::post('/categoria',[CategoriaApiController::class, 'store']);

/* Route::get('/estudiante',[EstudianteApiController::class,'index']);
Route::get('/etiquetas', [EtiquetasApiController::class, 'show' ]);
Route::post('/estudiante',[EstudianteApiController::class, 'store']);
Route::put('/estudiante/{id}',[EstudianteApiController::class, 'update']);
Route::delete('/estudiante/{id}',[EstudianteApiController::class,'destroy']);
 */
Route::apiResource('estudiante', App\Http\Controllers\EstudianteApiController::class);
