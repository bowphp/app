<?php

namespace App\Models;

use Bow\Auth\Authentication as Model;

class User extends Model
{
    /**
     * The list of hidden field when toJson is called
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
    
    // Do something
}
