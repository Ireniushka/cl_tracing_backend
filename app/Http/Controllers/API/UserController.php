<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{    
    /**
     * Método para devolver todas los usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        
        return response()->json(['Users' => $users->toArray()], $this->successStatus);
    }


    /**
     * Método para crear un usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //Se valida formulario
        $validator = Validator::make($request->all(), [ 'dni' => 'required|unique:pupils,dni|regex:/^\d{8}[-]{1}[A-Z]{1}/',
        'type','name' => 'required|string','last_name' => 'required|string','username' => 'unique:users,username|string|max:45',
        'password','passChanged' => 'boolean'       
        ]);

        //Se devuelve error si falla la validacion
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }else{
            //Si esta todo correcto se guarda al nuevo usuario, encriptando la contraseña
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);

            return response()->json(['User' =>  $user->toArray()], $this->successStatus);
        }
    }

    /**
     * Método para mostrar un usuario segun su id
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function show($dni) {
        $user = User::find($dni);
        
        if (is_null($user)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        return response()->json(['User' => $user->toArray()], $this->successStatus);
    }


    /**
     * Método para modificar datos de un usuario
     *
     * @param string  $dni
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($dni,Request $request) {
        $input = $request->all();
        
        $validator = Validator::make($input, ['dni' => 'required|unique:pupils,dni|regex:/^\d{8}[-]{1}[A-Z]{1}/',
        'type','name' => 'required|string','last_name' => 'required|string','username' => 'unique:users,username|string|max:45',
        'password','passChanged' => 'boolean' 
        ]);
        
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        if(array_key_exists('password', $input)){
            $input['password'] = bcrypt($input['password']);
        }
        
        $user = User::find($dni);
        $user->update($input);

        return response()->json(['User' => $user->toArray()], $this->successStatus);
    }

    /**
     * Método para eliminar un usuario
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni) {
        $user = User::find($dni);
        $user->delete();
        
        return response()->json(['User' => $user->toArray()], $this->successStatus);
    }
}
