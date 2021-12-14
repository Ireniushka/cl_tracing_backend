<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{

    /**
     * Método para devolver todas las actividades
     *
     * @return \Illuminate\Http\Response
    */
    public function index() {
        $activities = Activity::all();
        
        return response()->json(['Activities' => $activities->toArray()], $this->successStatus);
    }
    
    /**
     * Método para crear una actividad
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['name' => 'required|string|max:50','url'=> 'string|max:100',
        'url_type' => 'in:web,file,nothing','enunciation'=> 'required|string','description'=> 'required|string',
        'materials'=> 'required|string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $activity = Activity::create($input);
        
        return response()->json(['Activity' => $activity->toArray()], $this->successStatus);
    }
    
    /**
     * Método para mostrar una actividad segun su id
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $activity = Activity::find($id);
        
        if (is_null($activity)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        return response()->json(['Activity' => $activity->toArray()], $this->successStatus);
    }
     
    
    
    /**
     * Método para modificar una actividad
     * 
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update($id, Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['name' => 'required|string|max:50','url'=> 'string|max:100',
        'url_type' => 'in:web,file,nothing','enunciation'=> 'required|string','description'=> 'required|string',
        'materials'=> 'required|string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $activity = Activity::find($id);
        $activity->update($input);

        return response()->json(['Activity' => $activity->toArray()], $this->successStatus);
    }
    
    /**
     * Método para eliminar una actividad
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id) {
        $activity = Activity::find($id);
        $activity->delete();
        
        return response()->json(['Activity' => $activity->toArray()], $this->successStatus);
    }
    
}
