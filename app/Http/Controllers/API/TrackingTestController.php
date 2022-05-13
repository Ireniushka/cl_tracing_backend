<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tracking_test;
use App\Pupil;
use Validator;

class TrackingTestController extends Controller
{
    /**
     * Método para devolver todos los seguimientos de tests
     * 
     * @return \Illuminate\Http\Response
    */
    public function index() {
        $trackings = Tracking_test::all();
        
        return response()->json(['Tracking tests' => $trackings->toArray()], $this->successStatus);
    }
    
    /**
     * Método para crear un seguimiento de test
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['pupil_id'=>'required|exists:pupils,id',
        'lat_cruzada' => 'boolean','comment'=>'string',
        ]);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $tracking = Tracking_test::create($input);
        
        return response()->json(['Tracking_test' => $tracking->toArray()], $this->successStatus);
    }
    
    /**
     * Método para mostrar un seguimiento de test segun su id
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $tracking = Tracking_test::find($id);
        
        if (is_null($tracking)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        return response()->json(['Tracking_test' => array_merge($tracking->toArray()) ], $this->successStatus);
    }
     
    
    
    /**
     * Método para modificar datos de un seguimiento de test
     * 
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function update($id, Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['pupil_id'=>'exists:pupils,id','lat_cruzada' => 'boolean','comment'=>'string']);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $tracking = Tracking_test::find($id);
        $tracking->update($input);

        return response()->json(['Tracking_test' => $tracking->toArray()], $this->successStatus);
    }
    
    /**
     * Método para eliminar un seguimiento de test
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id) {
        $tracking = Tracking_test::find($id);
        $tracking->delete();
        
        return response()->json(['Tracking_test' => $tracking->toArray()], $this->successStatus);
    }
    
}
