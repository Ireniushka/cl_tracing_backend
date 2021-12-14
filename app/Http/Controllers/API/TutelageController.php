<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutelageController extends Controller
{    /**
    * Método para devolver todos los educandos
    * 
    * @return \Illuminate\Http\Response
   */
   public function index() {
       $tutelages = Tutelage::all();
       
       return response()->json(['Tutelages' => $tutelages->toArray()], $this->successStatus);
   }
   
   /**
    * Método para crear un educando
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
   */
   public function store(Request $request) {
       $input = $request->all();
       
       $validator = Validator::make($input, ['pupil_id'=>'required|exists:pupils,dni,pupil_id',
       'legal_tutor_id'=>'required|exists:users,dni,legal_tutor_id',
       ]);
       
       if($validator->fails()){
           return response()->json(['error' => $validator->errors()], 401);
       }
       
       $tutelage = Tutelage::create($input);
       
       return response()->json(['Tutelage' => $tutelage->toArray()], $this->successStatus);
   }
   
   /**
    * Método para mostrar un educando segun su id
    * 
    * @param  string  $pupil_id, $tutor_id
    * @return \Illuminate\Http\Response
   */
   public function show($pupil_id, $tutor_id) {
       $tutelage = Tutelage::find($pupil_id, $tutor_id);
       //$tutelage = Tutelage::where('pupil_id','=',$pupil_id)->where('legal_tutor_id','=',$tutor_id)->get();
       
       if (is_null($tutelage)) {
           return response()->json(['error' => $validator->errors()], 401);
       }
       
       return response()->json(['Tutelage' => array_merge($tutelage->toArray()) ], $this->successStatus);
   }
    
   
   
   /**
    * Método para modificar datos de un educando
    * 
    * @param string $pupil_id, $tutor_id
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
   */
   public function update($pupil_id, $tutor_id, Request $request) {
       $input = $request->all();
       
       $validator = Validator::make($input, ['pupil_id'=>'required|exists:pupils,dni,pupil_id',
       'legal_tutor_id'=>'required|exists:users,dni,legal_tutor_id',
       ]);
       
       if($validator->fails()){
           return response()->json(['error' => $validator->errors()], 401);
       }
       
       $tutelage = Tutelage::find($pupil_id, $tutor_id);
       $tutelage->update($input);

       return response()->json(['Tutelage' => $tutelage->toArray()], $this->successStatus);
   }
   
   /**
    * Método para eliminar un educando
    *
    * @param  string $pupil_id, $tutor_id
    * @return \Illuminate\Http\Response 
    */
   public function destroy($pupil_id, $tutor_id) {
       $tutelage = Tutelage::find($pupil_id, $tutor_id);
       $tutelage->delete();
       
       return response()->json(['Tutelage' => $tutelage->toArray()], $this->successStatus);
   }
   
}
