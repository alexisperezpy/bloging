<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException as ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    
    protected $dontReport = [
        //
    ];
    
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'res' => __('Los datos proporcionados no son válidos.'),
            'errores' => $exception->errors(),
        ], $exception->status);
    }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                "res" => false,
                "error" => "No tiene permisos para acceder a este recurso."
            ], 401);
        }
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            if ($request->expectsJson()) {
                return response('Sorry, validation failed.', 422);
            }
        }
      /*  if ($request->is('api/*')) {
            if ($exception instanceof ModelNotFoundException) {
                $model = strtolower(class_basename($exception->getModel()));

                return response()->json([
                    'error' => 'Model not found'
                ], 404);
            }
            if ($exception instanceof NotFoundHttpException) {
                return response()->json('Resource not found', 404);
            }
        }
        */
        if ($exception instanceof ModelNotFoundException) {
            return response()->json("Error! registro no encontrado", 400);
        }
        
        if ($exception instanceof RouteNotFoundException) {
            return response()->json(
                "Error! no tiene permisos para acceder a esta ruta", 401);
        }
            
        return parent::render($request, $exception);
        
    }
}
