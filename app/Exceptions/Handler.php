<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        {
            // Verificamos si el debug está activo 
            if (config('app.debug')) {
                // Creamos una nueva instancia de la clase Run
                $whoops = new \Whoops\Run;
                // Registramos el manejador "pretty handler"
                $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    
                // Devolvemos una nueva respuesta 
                return response()->make(
                    $whoops->handleException($e),
                    method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500,
                    method_exists($e, 'getHeaders') ? $e->getHeaders() : []
                );
            }
            // Si debug == false : devolvemos la respuesta para la excepción 
            return parent::convertExceptionToResponse($e);
    
            //return parent::render($request, $exception);
    
        }
    }
}
