<?php

namespace App\Controllers;

use Bow\Http\Request;
use Bow\Http\Response;
use Bow\Database\Database;
use Bow\Validation\Validate;
use Bow\Validation\Validator;
use Bow\Queue\ProducerService;
use Bow\Contracts\ResponseInterface;
use Bow\Configuration\Loader as Config;
use Bow\Database\QueryBuilder;

class Controller
{
    /**
     * Push the producer on queue list
     *
     * @param  ProducerService $producer
     * @return mixed
     */
    public function queue(ProducerService $producer)
    {
        queue($producer);
    }

    /**
     * Make redirect
     *
     * @param  mixed $url
     * @param  array $parameters
     * @return ResponseInterface
     */
    public function redirect($url = null, array $parameters = []): ResponseInterface
    {
        if (is_null($url)) {
            return redirect();
        }

        return redirect(url($url, $parameters));
    }

    /**
     * Make view rendering
     *
     * @param  string $name
     * @param  array  $data
     * @param  int    $code
     * @return mixed
     */
    public function render($name, array $data = [], $code = 200)
    {
        return view($name, $data, $code);
    }

    /**
     * Get the current user request
     *
     * @return Request
     */
    public function request(): Request
    {
        return request();
    }

    /**
     * Get the response instance
     *
     * @return Response
     */
    public function response(): Response
    {
        return response();
    }

    /**
     * Return the application configuration
     *
     * @param  string|array $key
     * @param  mixed        $setting
     * @return Config|null
     */
    public function config(?string $key = null, mixed $setting = null)
    {
        return config($key, $setting);
    }

    /**
     * Get Database Instance
     *
     * @param ?string $name
     * @param ?callable $cb
     * @return Database
     */
    public function db(?string $name = null, ?callable $cb = null)
    {
        return call_user_func_array('db', func_get_args());
    }

    /**
     * Alias of table
     *
     * @param $name
     * @param string $connexion
     * @return QueryBuilder
     */
    public function table(string $name, ?string $connexion = null): QueryBuilder
    {
        return table($name, $connexion);
    }

    /**
     * Get last insert ID for auto increment
     *
     * @return mixed
     */
    public function getLastInsertId(): mixed
    {
        return get_last_insert_id();
    }

    /**
     * Get current session token
     *
     * @return string
     */
    public function getToken(): string
    {
        return csrf_token();
    }

    /**
     * Make validation
     *
     * @param Request $request
     * @param array $rule
     * @return Validate
     */
    protected function validate(Request $request, array $rule): Validate
    {
        $validation = Validator::make($request->all(), $rule);

        return $validation;
    }

    /**
     * Format API response
     *
     * @param string $message
     * @param string $code
     * @param array $data
     * @param int $status
     * @return array
     */
    public function nativeApiErrorResponse(
        $message = 'Internal Server Error',
        $code = 'INTERNAL_SERVER_ERROR',
        $data = [],
        $status = 500
    ) {
        $time = date('Y-m-d H:i:s');
        $error = compact('message', 'code', 'time');

        $this->response()->status($status);

        return compact('error', 'data');
    }

    /**
     * Fire Event
     *
     * @param string $event
     * @return void
     */
    public function emit($event)
    {
        $data = func_get_args();

        array_shift($data);
        array_unshift($data, $event);

        call_user_func_array('emit_event', $data);
    }
}
