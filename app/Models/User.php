<?php

namespace App\Models;

use Bow\Auth\Authentication as AuthenticationModel;

/**
 * @property mixed|string $name
 * @property mixed|string $lastname
 * @property mixed|string $email
 * @property bool|mixed|string $password
 */
class User extends AuthenticationModel
{
    /**
     * The list of hidden field when toJson is called
     *
     * @var array
     */
    protected array $hidden = [
        'password'
    ];

    // Do something
}
