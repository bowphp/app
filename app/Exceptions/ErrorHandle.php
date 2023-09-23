<?php

namespace App\Exceptions;

use Exception;
use Bow\Http\Exception\HttpException;
use Bow\Application\Exception\BaseErrorHandler;
use Bow\Http\Exception\ResponseException as HttpResponseException;
use Bow\Database\Exception\NotFoundException as ModelNotFoundException;

class ErrorHandle extends BaseErrorHandler
{
    /**
     * handle the error
     *
     * @param Exception $exception
     */
    public function handle($exception)
    {
        if (request()->isAjax()) {
            return $this->json($exception);
        }

        if (
            $exception instanceof ModelNotFoundException 
            || $exception instanceof HttpException
        ) {
            $code = $exception->getStatusCode();
            return $this->render('errors.' . $code, [
                'code' => 404,
                'exception' => $exception
            ]);
        }

        if ($exception instanceof HttpResponseException) {
            return $this->render('errors.500', [
                'code' => 404,
                'exception' => $exception
            ]);
        }
    }
}
