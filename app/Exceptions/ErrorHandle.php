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
}
