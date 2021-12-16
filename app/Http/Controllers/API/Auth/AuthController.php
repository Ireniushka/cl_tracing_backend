<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;


class AuthController extends Controller
{ 
    /**
     * Método para entrar en la aplicación
     *
     * @return \Illuminate\Http\Response
     */
    public function login() {
        // Se comprueba credenciales
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $user = Auth::user();
            // Se crea token de acceso
            $success['remember_token'] = $user->createToken('PersonalToken')->accessToken;
            $success['dni'] = $user->dni;
            $success['name'] = $user->name;
            $success['username'] = $user->username;
            $success['passChanged'] = $user->passChanged;
            
            return response()->json(['success' => $success], $this->successStatus);
        }else {
            // Se informa si surge algun error
            return response()->json(['error' => 'Oh, parece que se produjo un error, compruebe sus credenciales'], 401);
        }
    }

    /**
     * Método para salir de la aplicación
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }


    /**
     * Método para obtener usuario conectado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }



    /**
     * Método para recuperar contraseña
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetPass(Request $request) {
        //Para marzo con los emails
    }



    /**
     * Método para cambiar la contraseña
     *
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePass(Request $request) {
        //Se valida formulario
        $validator = Validator::make($request->all(), [ 
            'old_password' => 'required|exists:users,password,id,Auth::user()->id',
            'new_password' => 'required',
            'repeat_password' => 'required|same:new_password'      
        ]);//otra idea seria comprobar desde ionic la antigua pass y luego pasar a vista de cambio de passwd

        //Se devuelve error si falla la validacion
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }else{
            
            $input = $request->all();
            $input['new_password'] = bcrypt($input['new_password']);
            
            User::where('id',Auth::user()->id)
            ->update(['password'=>$input['new_password']]);

            return response()->json(['success' => $success], $this->successStatus);
        }

    }

}