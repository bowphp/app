<?php

namespace App\Models;

use Bow\Auth\Authentication as AuthenticatableModel;

class User extends AuthenticatableModel
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
