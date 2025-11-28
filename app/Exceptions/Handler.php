<?php

namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Throwable;


class Handler extends ExceptionHandler
{

    public function render($request, Throwable $exception)
    {
        if (!config('app.debug')) {
            \Log::error('Error caught:', [
                'exception' => $exception->getMessage(),
                'type' => get_class($exception),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]);

            // External API/Network Errors
            if ($exception instanceof ConnectException) {
                return response()->view('errors.503', [
                    'message' => 'External service unavailable. Please try again later.',
                    'type' => 'Connection Error'
                ], 503);
            }

            if ($exception instanceof ClientException) {
                return response()->view('errors.400', [
                    'message' => 'External API request error.',
                    'type' => 'Client Error'
                ], 400);
            }

            if ($exception instanceof ServerException) {
                return response()->view('errors.502', [
                    'message' => 'External service error. Please try again later.',
                    'type' => 'Server Error'
                ], 502);
            }

            if ($exception instanceof ModelNotFoundException) {
                return response()->view('errors.404', [
                    'message' => 'Resource not found.',
                    'type' => 'Model Not Found'
                ], 404);
            }

            if ($exception instanceof NotFoundHttpException) {
                return response()->view('errors.404', [
                    'message' => 'Page not found.',
                    'type' => 'Page Not Found'
                ], 404);
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                return response()->view('errors.405', [
                    'message' => 'Method not allowed.',
                    'type' => 'Method Not Allowed'
                ], 405);
            }

            // if ($exception instanceof ValidationException) {
            //     return response()->view('errors.422', [
            //         'message' => 'Validation failed.',
            //         'type' => 'Validation Error',
            //         'errors' => $exception->errors()
            //     ], 422);
            // }

       
            return response()->view('errors.500', [
                'message' => 'Something went wrong, please try again.',
                'type' => 'Server Error'
            ], 500);
        }

        return parent::render($request, $exception);
    }

}


// <?php

// namespace App\Exceptions;
// use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Throwable;


// class Handler extends ExceptionHandler
// {

//     public function render($request, Throwable $exception)
//     {
//         if (!config('app.debug')) {
//             \Log::error('Error caught:', ['exception' => $exception->getMessage()]);
            
//             return response()->view('errors.global_error', [
//                 'message' => 'Something went wrong, please try again.'
//             ], 500);
//         }

//         return parent::render($request, $exception);
//     }

// }