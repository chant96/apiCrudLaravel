<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EstudianteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("crearEstudiante",[EstudianteController::class, "createEstudiante"]);
Route::get("mostrarEstudiante",[EstudianteController::class,"readEstudiante"]);
Route::put("actualizarEstudiante",[EstudianteController::class,"updateEstudiante"]);
Route::delete("eliminarEstudiante",[EstudianteController::class,"deleteEstudiante"]);


