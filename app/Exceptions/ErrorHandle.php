<?php

namespace App\Exceptions;

use Exception;
use PDOException;
use Bow\Http\Exception\HttpException;
use Policier\Exception\TokenExpiredException;
use Policier\Exception\TokenInvalidException;
use Bow\Application\Exception\BaseErrorHandler;
use Bow\Http\Exception\ResponseException as HttpResponseException;
use Bow\Database\Exception\NotFoundException as ModelNotFoundException;

class ErrorHandle extends BaseErrorHandler
{
    /**
     * handle the error
     *
     * @param Exception $exception
     * @return mixed
     */
    public function handle($exception): mixed
    {
        if (request()->isAjax()) {
            return $this->json($exception);
        }

        if ($exception instanceof ModelNotFoundException || $exception instanceof HttpException) {
            $code = $exception->getStatusCode();
            $source = $this->render('errors.' . $code, [
                'code' => 404,
                'exception' => $exception
            ]);

            return $source;
        }

        if ($exception instanceof HttpResponseException) {
            return $this->render('errors.500', [
                'code' => 404,
                'exception' => $exception
            ]);
        }
    }

    /**
    * Send the json as response
    *
    * @param string $data
    * @param mixed $code
    * @return mixed
    */
    private function json($exception, $code = null)
    {
        if ($exception instanceof TokenInvalidException) {
            $code = 'TOKEN_INVALID';
        }

        if ($exception instanceof TokenExpiredException) {
            $code = 'TOKEN_EXPIRED';
        }

        if (is_null($code)) {
            if (method_exists($exception, 'getStatus')) {
                $code = $exception->getStatus();
            } else {
                $code = 'INTERNAL_SERVER_ERROR';
            }
        }

        if (app_env("APP_ENV") == "production" && $exception instanceof PDOException) {
            $message = 'Internal error occured';
        } else {
            $message = $exception->getMessage();
        }

        $error = [
            'message' => $message,
            'code' => $code,
            'time' => date('Y-m-d H:i:s')
        ];

        if (config('app.error_trace')) {
            $trace = $exception->getTrace();
        } else {
            $trace = [];
        }

        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();
        } else {
            $status = 500;
        }

        return json(compact('error', 'trace'), $status);
    }
}
