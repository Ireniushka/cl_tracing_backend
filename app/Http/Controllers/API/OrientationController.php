<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrientationController extends Controller
{

    /**
     * Método para devolver todas las relaciones entre orientadores y alumnos
     * 
     * @return \Illuminate\Http\Response
    */
    public function index() {
        $orientations = Orientation::all();
        
        return response()->json(['Orientations' => $orientations->toArray()], $this->successStatus);
    }
    
    /**
     * Método para crear una relacion orientador - alumno
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, [
        ]);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $orientation = Orientation::create($input);
        
        return response()->json(['Orientation' => $orientation->toArray()], $this->successStatus);
    }
    
    /**
     * Método para mostrar una relacion orientador - alumno segun dni del alumno
     * 
     * @param  string  $dni
     * @return \Illuminate\Http\Response
    */
    public function show($dni) {
        $orientation = Orientation::find($id);
        
        if (is_null($orientation)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        

        return response()->json(['Orientation' => array_merge($orientation->toArray(),$info) ], $this->successStatus);
    }
     
    
    
    /**
     * Método para modificar datos de una relacion orientador - alumno
     * 
     * @param string $dni
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update($dni, Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, [
        ]);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $orientation = Orientation::find($dni);
        $orientation->update($input);

        return response()->json(['Orientation' => $orientation->toArray()], $this->successStatus);
    }
    
    /**
     * Método para eliminar una relacion orientador - alumno
     *
     * @param  string $dni
     * @return \Illuminate\Http\Response 
     */
    public function destroy($dni) {
        $orientation = Orientation::find($dni);
        $orientation->delete();
        
        return response()->json(['Orientation' => $orientation->toArray()], $this->successStatus);
    }
    
}
