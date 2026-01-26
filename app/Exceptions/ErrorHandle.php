<?php

namespace App\Exceptions;

use Exception;
use Bow\Http\Exception\HttpException;
use Bow\Application\Exception\BaseErrorHandler;
use Bow\Database\Exception\NotFoundException as ModelNotFoundException;

class ErrorHandle extends BaseErrorHandler
{
    /**
     * handle the error
     *
     * @param  Exception $exception
     * @return mixed|string
     */
    public function handle(Exception $exception): mixed
    {
        if (request()->isAjax()) {
            return $this->json($exception);
        }

        if (
            $exception instanceof ModelNotFoundException
            || $exception instanceof HttpException
        ) {
            $code = $exception->getStatusCode();

            return $this->render(
                'errors.' . $code,
                [
                'code' => 404,
                'exception' => $exception
                ]
            );
        }

        return $this->render(
            'errors.500',
            [
            'code' => 404,
            'exception' => $exception
            ]
        );
    }
}
