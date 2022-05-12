<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
   public function createEstudiante(Request $request){

       $crearEstudiante = new Estudiante;

       $crearEstudiante->dni = $request -> dni;
       $crearEstudiante->nombre = $request -> nombre;
       $crearEstudiante->apellido= $request -> apellido;
       $crearEstudiante->edad = $request -> edad;

       $crearEstudiante->save();
       return response()->json([
           "status"=> 1,
           "message" => "Estudiante creado correctamente"
       ]);
   }
   public function readEstudiante(){
    $estudianteresponse =Estudiante::get();
       return response()->json([
           "status"=> 1,
           "message" => "Mostrar Estudiantes",
           "estudiantes" => $estudianteresponse
       ]);
   }
   public function updateEstudiante(Request $request){
       $actualizarEstudiante = Estudiante::findOrFail($request->id);

       $actualizarEstudiante->dni = $request -> dni;
       $actualizarEstudiante->nombre = $request -> nombre;
       $actualizarEstudiante->apellido= $request -> apellido;
       $actualizarEstudiante->edad = $request -> edad;

       $actualizarEstudiante->save();

       return response()->json([
           "status"=> 1,
           "message" => "Estudiante actualizado correctamente"
       ]);
   }
   public function deleteEstudiante(Request $request){
       if(Estudiante::where("id",$request->id)->exists()){
           $eliminarEstudiante = Estudiante::find($request->id);
           $eliminarEstudiante->delete();
           return response()->json([
            "status"=> 1,
            "message" => "Estudiante eliminado correctamente"
            ]);
       }else{
           return response()->json([
           "status"=> 1,
           "message" => "Estudiante no encontrado"
            ]);
        }
   }
}
