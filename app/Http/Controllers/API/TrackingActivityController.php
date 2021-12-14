<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackingActivityController extends Controller
{
    /**
     * Método para devolver todos los seguimientos de actividades
     * @return \Illuminate\Http\Response
    */
    public function index() {
        $trackings = Tracking_activity::all();
        
        return response()->json(['Tracking_activities' => $trackings->toArray()], $this->successStatus);
    }
    
    /**
     * Método para crear un seguimiento de actividad
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['pupil_id'=>'required|exists:pupils,dni|unique:tracking_activities,pupil_id',
        'activity_id'=>'required|exists:activities,id|unique:tracking_activities,activity_id','comment'=>'string',]);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $tracking = Tracking_activity::create($input);
        
        return response()->json(['Tracking_activity' => $tracking->toArray()], $this->successStatus);
    }
    
    /**
     * Método para mostrar un seguimiento de actividad segun su id
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $tracking = Tracking_activity::find($id);
        
        if (is_null($tracking)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Tracking_activity' => array_merge($tracking->toArray()) ], $this->successStatus);
    }
     
    
    
    /**
     * Método para modificar datos de un seguimiento de actividad
     * 
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update($id, Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['pupil_id'=>'required|exists:pupils,dni|unique:tracking_activities,pupil_id',
        'activity_id'=>'required|exists:activities,id|unique:tracking_activities,activity_id','comment'=>'string',]);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $tracking = Tracking_activity::find($id);
        $tracking->update($input);

        return response()->json(['Tracking_activity' => $tracking->toArray()], $this->successStatus);
    }
    
    /**
     * Método para eliminar un seguimiento de actividad
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id) {
        $tracking = Tracking_activity::find($id);
        $tracking->delete();
        
        return response()->json(['Tracking_activity' => $tracking->toArray()], $this->successStatus);
    }
    
}
