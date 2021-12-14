<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PupilController extends Controller
{

    /**
     * Método para devolver todos los alumnos
     * 
     * @return \Illuminate\Http\Response
    */
    public function index() {
        $pupils = Pupil::all();
        
        return response()->json(['Pupils' => $pupils->toArray()], $this->successStatus);
    }
    
    /**
     * Método para crear un alumno
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['dni' => 'required|unique:pupils,dni|regex:/^\d{8}[-]{1}[A-Z]{1}/',
        'name' => 'required|string','last_name' => 'required|string','course' => 'string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $pupil = Pupil::create($input);
        
        return response()->json(['Pupil' => $pupil->toArray()], $this->successStatus);
    }
    

    /**
     * Método para mostrar un alumno segun su dni
     * 
     * @param  string  $dni
     * @return \Illuminate\Http\Response
    */
    public function show($dni) {
        $pupil = Pupil::find($dni);
        
        if (is_null($pupil)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Pupil' => array_merge($pupil->toArray())], $this->successStatus);
    }
     
    
    
    /**
     * Método para modificar datos de un alumno
     * 
     * @param string  $dni
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update($dni, Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['dni' => 'required|unique:pupils,dni|regex:/^\d{8}[-]{1}[A-Z]{1}/',
        'name' => 'required|string','last_name' => 'required|string','course' => 'string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $pupil = Pupil::find($dni);
        $pupil->update($input);

        return response()->json(['Pupil' => $pupil->toArray()], $this->successStatus);
    }
    
    /**
     * Método para eliminar un educando
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response 
     */
    public function destroy($dni) {
        $pupil = Pupil::find($dni);
        $pupil->delete();
        
        return response()->json(['Pupil' => $pupil->toArray()], $this->successStatus);
    }
    
}
