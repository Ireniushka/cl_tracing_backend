<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Relation;
use App\User;
use App\Pupil;
use Validator;

class RelationController extends Controller
{
    
    /**
     * Método para devolver todas las relaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $relations = Relation::all();
        
        return response()->json(['relations' => $relations->toArray()], $this->successStatus);
    }


    /**
     * Método para crear una relacion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['dni' => 'required|unique:relations,dni|regex:/^\d{8}[-]{1}[A-Z]{1}/',
        'name' => 'required|string','last_name' => 'required|string','course' => 'string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $relation = Relation::create($input);
        
        return response()->json(['Relation' => $relation->toArray()], $this->successStatus);
    }
    

    /**
     * Método para mostrar una relacion segun su dni
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $relation = Relation::find($id);
        
        if (is_null($relation)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Relation' => array_merge($relation->toArray())], $this->successStatus);
    }
     
    
    
    /**
     * Método para modificar datos de una relacion
     * 
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update($id, Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['dni' => 'unique:relations,dni|regex:/^\d{8}[-]{1}[A-Z]{1}/',
        'name' => 'string','last_name' => 'string','course' => 'string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $relation = Relation::find($id);
        $relation->update($input);

        return response()->json(['Relation' => $relation->toArray()], $this->successStatus);
    }
    
    /**
     * Método para eliminar una relacion
     *
     * @param  int $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id) {
        $relation = Relation::find($id);
        $relation->delete();
        
        return response()->json(['Relation' => $relation->toArray()], $this->successStatus);
    }
    
}
